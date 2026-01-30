<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
    body {
        font-family: 'Poppins', sans-serif;
    }
    .nav-link {
        position: relative;
        transition: all 0.3s ease;
    }
    .nav-link::after {
        content: '';
        position: absolute;
        bottom: -4px;
        left: 50%;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, #10b981, #3b82f6);
        border-radius: 2px;
        transform: translateX(-50%);
        transition: width 0.3s ease;
    }
    .nav-link:hover::after {
        width: 100%;
    }
    .logo-emoji {
        animation: bounce-gentle 2s ease-in-out infinite;
    }
    @keyframes bounce-gentle {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-3px); }
    }
</style>

<nav class="bg-white shadow-sm border-b-2 border-green-100 px-6 py-4 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <!-- Logo - Cute & Simple -->
        <div class="flex items-center space-x-2 cursor-pointer group">
            <span class="logo-emoji text-2xl">📚</span>
            <a href="/" class="text-xl font-bold bg-gradient-to-r from-green-600 to-blue-500 bg-clip-text text-transparent">
                Quiz System
            </a>
        </div>

        <!-- Desktop Navigation -->
        <div class="hidden md:flex items-center space-x-8">
            <a href="/" class="nav-link text-gray-700 hover:text-green-600 font-medium">
                Home
            </a>
            <a href="/user-categories" class="nav-link text-gray-700 hover:text-green-600 font-medium">
                Categories
            </a>
            
            @if(session('user'))
                <a href="/user-details" class="nav-link flex items-center space-x-2 text-gray-700 hover:text-green-600 font-medium">
                    <span class="text-lg">👋</span>
                    <span>{{ session('user')->name }}</span>
                </a>
                <a href="/user-logout" class="px-4 py-2 bg-red-50 text-red-600 hover:bg-red-100 rounded-full font-medium transition-all">
                    Logout
                </a>
            @else
                <a href="/user-login" class="nav-link text-gray-700 hover:text-green-600 font-medium">
                    Login
                </a>
                <a href="/user-signup" class="px-5 py-2 bg-gradient-to-r from-green-500 to-blue-500 text-white rounded-full font-semibold hover:shadow-lg transform hover:-translate-y-0.5 transition-all">
                    Sign Up
                </a>
            @endif
            
            <a href="/blog" class="nav-link text-gray-700 hover:text-green-600 font-medium">
                Blog
            </a>
        </div>

        <!-- Mobile Menu Button -->
        <button id="mobile-btn" class="md:hidden p-2 rounded-lg hover:bg-gray-100 transition-all">
            <svg id="open" class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <svg id="close" class="w-6 h-6 text-gray-700 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden mt-4 pb-4 space-y-3 border-t border-gray-100 pt-4">
        <a href="/" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-lg font-medium transition-all">
            🏠 Home
        </a>
        <a href="/user-categories" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-lg font-medium transition-all">
            📂 Categories
        </a>
        
        @if(session('user'))
            <a href="/user-details" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-lg font-medium transition-all">
           @php
                $user = Auth::user();

                $specialNames = [
                    'siwani',
                    'sitasma',
                    'siwani karki',
                    'sitasma karki',
                ];

                $name = $user ? strtolower(trim($user->name ?? '')) : '';
            @endphp

            👋 Welcome,
            @if ($user && in_array($name, $specialNames))
                My love ❤️
            @elseif ($user)
                {{ $user->name }}
            @else
                Guest
            @endif    
            </a>
            <a href="/user-logout" class="block px-4 py-2 bg-red-50 text-red-600 hover:bg-red-100 rounded-lg font-medium transition-all text-center">
                Logout
            </a>
        @else
            <a href="/user-login" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-lg font-medium transition-all">
                Login
            </a>
            <a href="/user-signup" class="block px-4 py-2 bg-gradient-to-r from-green-500 to-blue-500 text-white rounded-lg font-semibold text-center transition-all">
                Sign Up
            </a>
        @endif
        
        <a href="/blog" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded-lg font-medium transition-all">
            📝 Blog
        </a>
    </div>
</nav>

<script>
    const btn = document.getElementById('mobile-btn');
    const menu = document.getElementById('mobile-menu');
    const openIcon = document.getElementById('open');
    const closeIcon = document.getElementById('close');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
        openIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    });
</script>