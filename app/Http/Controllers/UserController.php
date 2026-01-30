<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session; 
use Illuminate\Support\Facades\Mail; 
use Illuminate\Support\Facades\Crypt; 
use Spatie\Browsershot\Browsershot;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Quiz;
use App\Models\Mcq;
use App\Models\User;
use App\Models\Record;
use App\Models\MCQ_Record;
use App\Mail\VerifyUser;
use App\Mail\UserForgetPassword;

class UserController extends Controller
{
    function welcome(){
        $categories=Category::withCount('quizzes')->get();

        $categories=Category::withCount('quizzes')->orderBy('quizzes_count','desc')->take(5)->get();
        $quizData = Quiz::withCount("Records")->orderBy('records_count','desc')->take(5)->get();

        return view('welcome',['categories'=>$categories,'quizData'=>$quizData]);
    }
    function userCategories(){
        $categories=Category::withCount('quizzes')->paginate(8);
        return view('user-categories',['categories'=>$categories]);

    }
    function userQuizList($id, $category){
        $quizData = Quiz::withCount("Mcq")->where('category_id', $id)->get();
        return view('user-quiz-list', [
                'name' => auth()->user()->name ?? null,
                'quizData' => $quizData,
                'category' => $category
            ]);
    }

    function startQuiz($id,$name){
        $quizCount= Mcq::where('quiz_id',$id)->count();
        $mcqs= Mcq::where('quiz_id',$id)->get();
         if ($mcqs->isEmpty()) {
            return redirect()->back()->with('error', 'No MCQs found for this quiz.');
        }
        Session::put('firstMCQ', $mcqs->first());         
        $mcqs[0]->id;
        $quizName =$name;
        return view('start-quiz',['quizName'=>$quizName,'quizCount'=>$quizCount]);
    }

    function userSignup(Request $request){
        $validate = $request->validate([
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:4|confirmed',
        ]);
        $user =User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        
        $link = Crypt::encryptString($user->email);
        $link =url('verify-user/'.$link);
        Mail::to($user->email)->send(new VerifyUser($link));



        if($user){
            Session::put('user',$user);
            if(Session::has('quiz-url')){
            $url=Session::get('quiz-url'); 
            Session::forget('quiz-url');
            return redirect($url)->with('message-success',"User registered successfully,Please Check email to verify account.");
        }else{
        return redirect('/')->with('message-success',"User registered successfully,Please Check email to verify account.");
        }
        }
    }
    function userLogout(){
        Session::forget('user');
        return redirect('/');
    }
    function userSignupQuiz(){
        Session::put('quiz-url', url()->previous());
        return view('user-signup');

    }
    function userLogin(Request $request)
            {$validate = $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $user =User::where('email',$request->email)->first();
            if(!$user || !Hash::check($request->password,$user->password)){
                return redirect('user-login')->with('message-error',"User not valid, Please check email and password again");
            
            }
        
        if($user){
            Session::put('user',$user);
            if(Session::has('quiz-url')){
            $url=Session::get('quiz-url'); 
            Session::forget('quiz-url');
            return redirect($url)->with('message',"User Login successfully");
        }else{
        return redirect('/')->with('message',"User Login successfully");
        }
        }
    }
    function userLoginQuiz(){
        Session::put('quiz-url', url()->previous());
        return view('user-login');

    }
    function mcq($id,$name){
        $record=new Record();
        $record->user_id=Session::get('user')->id;
        $record->quiz_id=Session::get('firstMCQ')->quiz_id;
        $record->status=1;
        if($record->save()){
        $currentQuiz=[];
        $currentQuiz['totalMcq']=MCQ::where('quiz_id',Session::get('firstMCQ')->quiz_id)->count();
        $currentQuiz['currentMcq']=1;
        $currentQuiz['currentQuiz']=$name;
        $firstMcq = Session::get('firstMCQ');

        if ($firstMcq) {
            $currentQuiz['quizId'] = $firstMcq->quiz_id;
        } else {
            return redirect()->back()->with('error', 'Quiz session not found.');
        }
        $currentQuiz['recordId']=$record->id;
        Session::put('currentQuiz',$currentQuiz);
        $mcqData=MCQ::find($id);
        return view('mcq-page',['quizName'=>$name,'mcqData'=>$mcqData]);

        }else{
            return('Something went wrong');
        }

        

    }
    public function showMcq($id)
{
    $currentQuiz = Session::get('currentQuiz');

    if (!$currentQuiz) {
        return redirect('/')->with('error', 'Quiz session expired.');
    }

    $mcqData = MCQ::where([
        ['id', '=', $id],
        ['quiz_id', '=', $currentQuiz['quizId']],
    ])->first();

    if (!$mcqData) {
        return redirect('/')->with('error', 'Question not found.');
    }

    return view('mcq-page', [
        'quizName' => $currentQuiz['currentQuiz'],
        'mcqData'  => $mcqData,
    ]);
}
    function submitAndNext(Request $request, $id){
        if (!$request->has('option')) {
            return redirect()->back()
                ->withErrors(['option' => 'Please select the answer before submitting.'])
                ->withInput();
        }
        $currentQuiz=Session::get('currentQuiz');
        $currentQuiz['currentMcq'] +=1;
        $mcqData=MCQ::where([
            ['id','>',$id],
            ['quiz_id','=',$currentQuiz['quizId']]
        ])->first();

         $isExist=MCQ_Record::where([
            ['record_id','=',$currentQuiz['recordId']],
            ['mcq_id','=',$request->id],
        ])->count();
        if($isExist<1){
        $mcq_record=new MCQ_Record;
        $mcq_record->record_id=$currentQuiz['recordId'];
        $mcq_record->user_id=Session::get('user')->id;
        $mcq_record->mcq_id=$request->id;
        $mcq_record->selected_answer=$request->option;
        if($request->option == MCQ::find($request->id)->correct_ans){
             $mcq_record->is_correct=1;

        }else{
            $mcq_record->is_correct=0;
        }
       if(!$mcq_record->save()){
            return"something went worng";
       }
        }
        

        Session::put('currentQuiz',$currentQuiz);
        if($mcqData){
            return redirect()->route('mcq.show', $mcqData->id);
            return view('mcq-page',['quizName'=>$currentQuiz['currentQuiz'],'mcqData'=>$mcqData]);

        }else{
            $resultData=MCQ_Record::WithMCQ()->where('record_id',$currentQuiz['recordId'])->get();
            $correctAnswer=MCQ_Record::where([
            ['record_id','=',$currentQuiz['recordId']],
            ['is_correct','=',1], 
            ])->count();

            $record = Record::find($currentQuiz['recordId']);
            if($record){
                $record->status=2;
                $record->update();

            }
            return view('quiz-result',['resultData'=>$resultData,'correctAnswer'=>$correctAnswer]);

            }

    }

    function userDetails(){
        $quizRecord=Record::WithQuiz()->where('user_id',Session::get('user')->id)->paginate(8);
        return view('user-details',['quizRecord'=>$quizRecord]);
    }
    function searchQuiz(Request $request){
          $quizData = Quiz::withCount("Mcq")->where('name','Like','%'.$request->search.'%')->get();
        return view('quiz-search',['quizData'=>$quizData,'quiz'=>$request->search]);
    }

    function verifyUser($email){
        $orgEmail=Crypt::decryptString($email);
        $user=User::where('email',$orgEmail)->first();
        if($user){
            $user->active=2;
        if( $user->save())
            {
                return redirect('/')->with('message-success',"User verified successfully.");

            }

        }
    }
    function userForgotPassword(Request $request)
        {
            $request->validate([
                'email' => 'required|email'
            ]);

            $encrypted = Crypt::encryptString($request->email);
            $link = url('/user-set-forgot-password/' . $encrypted);

            Mail::to($request->email)->send(
                new UserForgetPassword($link)
            );

                return redirect('/')->with('message-success',"Email send to your account successfully.");
        }

    function userResetForgetPassword($email)
        {
        $orgEmail = Crypt::decryptString($email);
        return view('user-set-forgot-password', ['email' => $orgEmail]);
        }
    function userSetForgetPassword(Request $request){
         $validate = $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:4|confirmed',
        ]);
        $user =User::where('email',$request->email)->first();
        if($user){
            $user->password=Hash::make($request->password);
            
            if($user->save()){
                return redirect('user-login')->with('message-success',"Your password is set,try logging with your new password");
        }

            }
        }
        function certificate(){
            $data=[];
            $data['quiz']=str_replace('-',' ',Session::get('currentQuiz')['currentQuiz']) ;
            $data['name']=Session::get('user')['name'];
            return view('certificate',['data'=>$data]);
            
        }
        function downloadCertificate(){
            $data=[];
            $data['quiz']=str_replace('-',' ',Session::get('currentQuiz')['currentQuiz']) ;
            $data['name']=Session::get('user')['name'];
            $html= view('download-certificate',['data'=>$data])->render();
            return response(
                Browsershot::html($html)->pdf()
            )->withHeaders([
                'content-type'=>"application/pdf",
                'content-disposition'=>"attachment;filename=certificate.pdf"
            ]);

        }
    }
