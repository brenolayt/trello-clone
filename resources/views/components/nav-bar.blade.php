<!-- NAVBAR -->
<nav class="bg-white shadow-sm py-4">
    <div class="max-w-7xl mx-auto px-6 flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center space-x-2">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" class="w-32" alt="Logo">
            </a>
        </div>

        <!-- Menu -->
        <div class="flex items-center space-x-8">
            <a href="#" class="text-gray-600 hover:text-gray-900">Features</a>
            <a href="#" class="text-gray-600 hover:text-gray-900">Plans</a>
            <a href="#" class="text-gray-600 hover:text-gray-900">Resources</a>
            @auth
            <a href="/login" class="text-gray-700 hover:text-gray-900 font-semibold">Logout</a>
            @else
            <a href="/login" class="text-gray-700 hover:text-gray-900 font-semibold">Login</a>
            <a href="/register"
                class="bg-blue-600 text-white px-4 py-2 rounded-md shadow hover:bg-blue-700">
                Get Started Free
            </a>
            @endauth
        </div>
    </div>
</nav>