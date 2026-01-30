<nav class="bg-white shadow-md px-4 py-4">
       <div class="flex justify-between items-center ">
         <div class="text-2xl text-grey-700 hover:text-blue-500 cursor-pointer text-green-900 ">
            Quiz System
        </div>
        <div class="space-x-6">
            <a  class="text-green-900 hover:text-blue-500" href="/">Home</a>
            <a  class="text-green-900 hover:text-blue-500" href="/user-categories">Categories</a>
            @if(session('user'))
            <a class="text-green-900 hover:text-blue-500" href="/user-details">Welcome,{{session('user')->name}}</a>
            <a class="text-green-900 hover:text-blue-500" href="/user-logout">Logout</a>
            @else<a class="text-green-900 hover:text-blue-500" href="user-login">Login</a>
            <a class="text-green-900 hover:text-blue-500" href="/user-signup">SignUp</a>
            @endif
        </div>
       </div>
    </nav>