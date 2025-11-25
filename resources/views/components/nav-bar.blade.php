<!-- NAVBAR -->
<nav x-data="{ open:false }" class="bg-white shadow-sm py-4">
    <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">

        <!-- Logo -->
        <div class="flex items-center space-x-2">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" class="w-32" alt="Logo">
            </a>
        </div>

        <!-- DESKTOP MENU -->
        <div class="hidden md:flex items-center space-x-8">
            <a href="#" class="text-gray-600 hover:text-gray-900">Features</a>
            <a href="#" class="text-gray-600 hover:text-gray-900">Plans</a>
            <a href="#" class="text-gray-600 hover:text-gray-900">Resources</a>

            @auth
            <div x-data="{ open: false }" class="relative">

                <!-- Avatar Button -->
                <button
                    @click="open = !open"
                    class="w-10 h-10 rounded-full overflow-hidden border border-gray-300 shadow-sm bg-gray-100">

                    @if(auth()->user()->avatar)
                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}"
                        class="w-full h-full object-cover" alt="Avatar">
                    @else
                    <div class="w-full h-full bg-blue-600 flex items-center justify-center text-white font-bold">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    @endif
                </button>

                <!-- Dropdown -->
                <div
                    x-show="open"
                    @click.outside="open = false"
                    x-transition
                    class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-xl shadow-lg py-2 z-50">

                    <!-- Username -->
                    <div class="px-4 py-2 text-gray-700 font-semibold border-b border-gray-100">
                        {{ auth()->user()->name }}
                    </div>

                    <!-- Profile -->
                    <a href="{{ route('profile.show') }}"
                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                        Profile
                    </a>

                    <!-- Logout -->
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button
                            class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                            Logout
                        </button>
                    </form>
                </div>
            </div>

            @else
            <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900 font-semibold">Login</a>

            <a href="{{ route('register.show') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded-md shadow hover:bg-blue-700">
                Get Started Free
            </a>
            @endauth
        </div>

        <!-- MOBILE HAMBURGER -->
        <button
            @click="open = !open"
            class="md:hidden text-gray-700 hover:text-gray-900 focus:outline-none">
            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>

            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

    </div>

    <!-- MOBILE MENU -->
    <div
        x-show="open"
        x-transition
        class="md:hidden px-6 pb-4 space-y-4">

        <a href="#" class="block text-gray-600 hover:text-gray-900">Features</a>
        <a href="#" class="block text-gray-600 hover:text-gray-900">Plans</a>
        <a href="#" class="block text-gray-600 hover:text-gray-900">Resources</a>

        @auth
        <a href="{{ route('profile.show') }}"
            class="block text-gray-700 font-semibold hover:text-gray-900">
            Profile
        </a>

        <form action="{{ route('logout') }}" method="POST" class="flex items-center">
            @csrf
            <button class="text-gray-700 hover:text-gray-900 font-semibold leading-none">
                Logout
            </button>
        </form>

        @else
        <a href="{{ route('login') }}" class="block text-gray-700 hover:text-gray-900 font-semibold">Login</a>

        <a href="{{ route('register.show') }}"
            class="block bg-blue-600 text-white text-center px-4 py-3 rounded-lg shadow hover:bg-blue-700">
            Get Started Free
        </a>
        @endauth
    </div>
</nav>