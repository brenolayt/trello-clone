<div class="min-h-screen flex flex-col justify-center items-center bg-linear-to-br from-white to-slate-100 p-6">

    <!-- Logo -->
    <div class="mb-6 flex items-center space-x-2">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" class="h-14" alt="Logo">
        </a>
    </div>

    <!-- Login Card -->
    <div class="bg-white w-full max-w-md p-8 rounded-2xl shadow-xl border border-slate-200">

        <h2 class="text-2xl font-semibold text-slate-800 mb-6 text-center">
            Login to your account
        </h2>

        @error('login')
        <div class="mb-4 p-3 bg-red-100 text-red-600 rounded-xl text-sm">
            <p>{{$message}}</p>
        </div>
        @enderror

        <!-- Login Form (frontend only) -->
        <form action="{{ route('login.submit') }}" method="POST" class="space-y-5">
            @csrf
            <!-- Username -->
            <div>
                <label class="block text-slate-700 font-medium mb-1">Email</label>
                <input name="email" type="text"
                       class="w-full p-3 rounded-xl border border-slate-300 bg-slate-50
                              focus:border-blue-500 focus:ring-blue-500"
                       placeholder="Enter your email">
            </div>

            <!-- Password -->
            <div>
                <label class="block text-slate-700 font-medium mb-1">Password</label>
                <input name="password" type="password"
                       class="w-full p-3 rounded-xl border border-slate-300 bg-slate-50
                              focus:border-blue-500 focus:ring-blue-500"
                       placeholder="Enter your password">
            </div>

            <!-- Login Button -->
            <button type="submit"
                    class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white
                           font-semibold rounded-xl shadow-lg transition">
                Login
            </button>
        </form>

        <!-- Register Redirect -->
        <div class="text-center mt-6">
            <p class="text-slate-600">
                Don’t have an account?
                <a href="{{ route('register.show') }}"
                   class="text-blue-600 hover:text-blue-700 font-medium">
                   Register here
                </a>
            </p>
        </div>

    </div>
</div>
