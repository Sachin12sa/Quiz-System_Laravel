<nav class="bg-white shadow-md px-6 py-4 sticky top-0 z-50">
    <div class="flex flex-wrap justify-between items-center max-w-7xl mx-auto">

        <!-- Logo / Brand -->
        <div class="text-2xl font-bold text-gray-800 hover:text-blue-500 cursor-pointer">
            Quiz System
        </div>

        <!-- Links -->
        <div class="hidden md:flex space-x-6 items-center">
            <a href="/dashboard" class="text-gray-700 hover:text-blue-500 font-medium transition duration-200">Dashboard</a>
            <a href="/admin-categories" class="text-gray-700 hover:text-blue-500 font-medium transition duration-200">Categories</a>
            <a href="/add-quiz" class="text-gray-700 hover:text-blue-500 font-medium transition duration-200">Quiz</a>
            <span class="text-gray-700 font-medium">Welcome 🙏 {{ $name }}</span>
            <a href="/admin-logout" class="text-red-500 hover:text-red-700 font-medium transition duration-200">Logout</a>
        </div>

        <!-- Mobile Menu Button -->
        <div class="md:hidden flex items-center">
            <button id="menu-button" class="text-gray-700 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden mt-2 px-4 space-y-2">
        <a href="/dashboard" class="block text-gray-700 hover:text-blue-500 font-medium">Dashboard</a>
        <a href="/admin-categories" class="block text-gray-700 hover:text-blue-500 font-medium">Categories</a>
        <a href="/add-quiz" class="block text-gray-700 hover:text-blue-500 font-medium">Quiz</a>
        <span class="block text-gray-700 font-medium">Welcome 🙏 {{ $name }}</span>
        <a href="/admin-logout" class="block text-red-500 hover:text-red-700 font-medium">Logout</a>
    </div>
</nav>

<script>
    const menuButton = document.getElementById('menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    menuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>