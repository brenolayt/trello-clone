<div class="min-h-screen flex flex-col justify-center items-center bg-linear-to-br from-white to-slate-100 p-6">

    <!-- Logo -->
    <div class="mb-6 flex items-center space-x-2">
        <a href="{{route('home')}}">
            <img src="{{ asset('images/logo.png') }}" class="h-12" alt="Logo">
        </a>
    </div>

    <!-- Register Card -->
    <div class="bg-white w-full max-w-md p-8 rounded-2xl shadow-xl border border-slate-200">

        <h2 class="text-2xl font-semibold text-slate-800 mb-6 text-center">
            Create your account
        </h2>
        
        <!-- Register Form (frontend only) -->
        <form action="{{ route('register.submit') }}" method="POST" class="space-y-5">
            @csrf
            <!-- Username -->
            <div>
                <label class="block text-slate-700 font-medium mb-1">Username</label>
                <input name="username" type="text"
                    class="w-full p-3 rounded-xl border border-slate-300 focus:border-blue-500 focus:ring-blue-500 bg-slate-50"
                    placeholder="Choose a username">
                @error('username')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-slate-700 font-medium mb-1">Email</label>
                <input name="email" type="text"
                    class="w-full p-3 rounded-xl border border-slate-300 focus:border-blue-500 focus:ring-blue-500 bg-slate-50"
                    placeholder="Enter your email">
                @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="block text-slate-700 font-medium mb-1">Password</label>
                <input name="password" type="password"
                    class="w-full p-3 rounded-xl border border-slate-300 focus:border-blue-500 focus:ring-blue-500 bg-slate-50"
                    placeholder="Choose a password">
                @error('password')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label class="block text-slate-700 font-medium mb-1">Confirm Password</label>
                <input name="password" type="password"
                    class="w-full p-3 rounded-xl border border-slate-300 focus:border-blue-500 focus:ring-blue-500 bg-slate-50"
                    placeholder="Re-enter your password">
            </div>

            <!-- Register Button -->
            <button type="submit"
                class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-lg transition">
                Create Account
            </button>
        </form>

        <!-- Login Redirect -->
        <div class="text-center mt-6">
            <p class="text-slate-600">
                Already have an account?
                <a href="{{route('login.show')}}" class="text-blue-600 hover:text-blue-700 font-medium">
                    Login here
                </a>
            </p>
        </div>

    </div>
</div>