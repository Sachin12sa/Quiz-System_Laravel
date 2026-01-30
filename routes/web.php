<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
Route::get('/',[UserController::class,'welcome']);
Route::get('user-catagories',[UserController::class,'welcome']);


Route::get('/user-quiz-list/{id}/{category}',[UserController::class,'userQuizList']);
Route::view('start-quiz','start-quiz');
Route::get('/start-quiz/{id}/{name}',[UserController::class,'startQuiz']);
Route::get('/user-logout',[UserController::class,'userLogout']);
// Route::view('/user-signup','user-signup');
Route::post('/user-signup',[UserController::class,'userSignup']);
Route::get('/user-signup-quiz',[UserController::class,'userSignupQuiz']);
Route::get("/user-categories",[UserController::class,'userCategories']);
Route::get("/certificate",[UserController::class,'certificate']);
Route::get("/download-certificate",[UserController::class,'downloadCertificate']);


Route::get('/user-login', function () {
if (Session::has('user')) {
return redirect('/'); 
}

return view('user-login');
});
Route::get('/user-signup', function () {
if (Session::has('user')) {
return redirect('/'); 
}

return view('user-signup'); 
});
// Route::view('/user-login','user-login');
Route::post('/user-login',[UserController::class,'userLogin']);
Route::get('/user-login-quiz',[UserController::class,'userLoginQuiz']);
Route::get('/search-quiz',[UserController::class,'searchQuiz']);
Route::get('/verify-user/{email}',[UserController::class,'verifyUser']);





Route::middleware('CheckUserAuth')->group(function(){
    Route::get('/user-details',[UserController::class,'userDetails']);
    Route::post('/submit-next/{id}',[UserController::class,'submitAndNext']);
    Route::get('/mcq/{id}', [UserController::class, 'showMcq'])->name('mcq.show');
    Route::get('/mcq/{id}/{name}',[UserController::class,'mcq']);
});


Route::view('/admin-login','admin-login');
Route::post("/admin-login",[AdminController::class,'login']);
Route::get('/user-forgot-password', function () {return view('user-forgot-password');});
Route::post('/user-forgot-password', [UserController::class,'userForgotPassword']);
Route::get('/user-forgot-password/{email}',[UserController::class, 'userResetForgetPassword']);
Route::get('/user-set-forgot-password/{email}',[UserController::class, 'userResetForgetPassword']);
Route::post('/user-set-forgot-password',[UserController::class, 'userSetForgetPassword']);

Route::middleware('CheckAdminAuth')->group(function(){
    Route::get("/dashboard",[AdminController::class,'dashboard']);
    Route::get("/admin-categories",[AdminController::class,'categories']);
    Route::get("/admin-logout",[AdminController::class,'logout']);
    Route::post("/add-category",[AdminController::class,'addCategory']);
    Route::get("/category/delete/{id}",[AdminController::class,'deleteCategory']);
    Route::match(['get','post'], '/add-quiz', [AdminController::class, 'addQuiz'])->name('add.quiz');
    Route::post("/add-mcq",[AdminController::class,'addMCQs']);
    Route::get("/end-quiz",[AdminController::class,'endQuiz']);
    Route::get("/show-quiz/{id}",[AdminController::class,'showQuiz']);
    Route::get("/show-quiz/{id}/{quizName}",[AdminController::class,'showQuiz']);
    Route::get('/quiz-list/{id}/{category}', [AdminController::class, 'quizList']);
});
