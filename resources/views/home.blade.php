<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trello Clone | Home</title>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-gray-50 text-gray-800">

    <x-nav-bar>

    </x-nav-bar>

    @auth
    @else
    <div class="w-full bg-blue-50 text-center py-2 text-sm text-blue-700 font-medium">
        Accelerate your team's productivity with AI features — now available!
    </div>
    @endauth

    <!-- HERO SECTION -->
    <section class="max-w-7xl mx-auto px-6 py-20 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        @auth
        <!-- LEFT: LOGGED-IN USER INFO -->
        <div>
            <div class="flex items-center space-x-4 mb-6">
                <!-- Avatar -->
                @if(auth()->user()->avatar)
                <img
                    src="{{ asset('storage/' . auth()->user()->avatar) }}"
                    class="w-20 h-20 rounded-full object-cover shadow-md"
                    alt="User Avatar">
                @else
                <div class="w-20 h-20 rounded-full bg-blue-600 text-white flex items-center 
                            justify-center text-3xl font-bold uppercase shadow-md">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
                @endif

                <div>
                    <h2 class="text-3xl font-bold text-gray-900">
                        Welcome, {{ auth()->user()->name }}!
                    </h2>
                    <p class="text-gray-600 text-lg">
                        Ready to organize your day?
                    </p>
                </div>
            </div>

            <p class="text-gray-700 mt-4 text-lg">
                Access your personal task board and keep everything under control.
            </p>

            <a href="{{ route('todo.show') }}"
                class="inline-block mt-8 bg-blue-600 text-white px-6 py-3 rounded-lg shadow
                  hover:bg-blue-700 text-lg font-medium transition">
                Go to your Todo List
            </a>
        </div>

        <!-- RIGHT: IMAGE -->
        <div class="flex justify-center relative">
            <div class="absolute -z-10 w-64 h-64 bg-purple-300 rounded-xl transform rotate-12 opacity-40"></div>

            <img src="{{ asset('images/phone2.png') }}"
                class="w-200 drop-shadow-xl rounded-3xl"
                alt="App Preview">
        </div>

        @else
        <!-- LEFT: PUBLIC (NOT LOGGED IN) -->
        <div>
            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight text-gray-900">
                Gather, organize and solve all your tasks<br>from anywhere.
            </h1>

            <p class="text-gray-600 mt-6 text-lg">
                Escape from the mess. Be more productive with trallalero.
            </p>

            <!-- EMAIL SIGNUP -->
            <form action="{{ route('registerEmail.show') }}" method="POST" class="mt-8 space-y-4 max-w-md">
                @csrf
                <input type="text"
                    name="email"
                    placeholder="E-mail"
                    class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">

                
                    <button type="submit"
                        class="w-full bg-blue-600 text-white px-4 py-3 rounded-lg shadow hover:bg-blue-700 text-lg font-medium">
                        Register your account for free!
                    </button>
            </form>

            <p class="text-gray-500 mt-4 text-sm">
                Inserting your email means that you know our privacy policy.
            </p>
        </div>

        <!-- RIGHT: IMAGE -->
        <div class="flex justify-center relative">
            <div class="absolute -z-10 w-64 h-64 bg-purple-300 rounded-xl transform rotate-12 opacity-40"></div>

            <img src="{{ asset('images/phone2.png') }}"
                class="w-200 drop-shadow-xl rounded-3xl"
                alt="App Preview">
        </div>
        @endauth

    </section>

</body>

</html>