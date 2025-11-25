<div class="min-h-screen flex justify-center items-center bg-slate-100 px-6 py-12">

    <div class="bg-white w-full max-w-lg p-8 rounded-2xl shadow-lg border border-gray-200">

        <!-- Back to Home -->
        <a href="{{ route('home') }}"
            class="inline-flex items-center mb-6 text-blue-600 hover:text-blue-800 font-medium">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 19l-7-7 7-7" />
            </svg>
            Back to Home
        </a>
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Your Profile</h2>

        <!-- Success Message -->
        @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-600 rounded-xl text-sm">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <!-- Avatar Upload -->
            <div class="flex flex-col items-center">
                <label for="avatarInput" class="cursor-pointer relative">

                    <!-- Avatar image -->
                    @if(auth()->user()->avatar)
                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}"
                        id="avatarPreview"
                        class="w-32 h-32 rounded-full object-cover shadow"
                        alt="Avatar">
                    @else
                    <div id="avatarPreview"
                        class="w-32 h-32 rounded-full bg-blue-600 text-white flex items-center justify-center text-4xl font-bold shadow">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    @endif

                    <!-- Change icon -->
                    <div class="absolute bottom-0 right-0 bg-white shadow-md rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.232 5.232l3.536 3.536M9 13l6.732-6.732a2.5 2.5 0 013.536 3.536L12.536 16.536a2.5 2.5 0 01-1.768.732H7v-3.768a2.5 2.5 0 01.732-1.768z" />
                        </svg>
                    </div>

                </label>

                <input type="file" id="avatarInput" name="avatar" class="hidden" accept="image/*"
                    onchange="previewAvatar(event)">
            </div>

            <!-- Name -->
            <div>
                <label class="text-gray-700 font-medium">Username</label>
                <input type="text" name="name"
                    value="{{ auth()->user()->name }}"
                    class="w-full mt-1 p-3 border rounded-xl bg-slate-50 border-gray-300
                        focus:border-blue-500 focus:ring-blue-500">
                @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="text-gray-700 font-medium">Email</label>
                <input type="email"
                    value="{{ auth()->user()->email }}"
                    class="w-full mt-1 p-3 border rounded-xl bg-gray-100 border-gray-300 cursor-not-allowed"
                    readonly>
            </div>

            <!-- Submit -->
            <button class="w-full py-3 bg-blue-600 text-white font-semibold rounded-xl shadow hover:bg-blue-700 transition">
                Save Changes
            </button>

        </form>

    </div>

</div>

<script>
    function previewAvatar(event) {
        const img = document.getElementById('avatarPreview');
        img.src = URL.createObjectURL(event.target.files[0]);
    }
</script>