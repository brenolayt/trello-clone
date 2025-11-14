<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Trello Clone</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <h1 class="text-xl font-semibold text-gray-700">Trallalero</h1>

            <div class="flex items-center space-x-6">
                <a href="/boards"
                   class="text-gray-600 hover:text-gray-900 font-medium transition">
                    Boards
                </a>

                @auth
                <a href="/logout"
                   class="text-red-500 hover:text-red-600 font-medium transition">
                    Logout
                </a>
                @else
                <a href="/login"
                   class="text-blue-500 hover:text-blue-600 font-medium transition">
                    Login
                </a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <section class="flex flex-col items-center justify-center text-center pt-24 px-4">
        <h2 class="text-4xl font-bold text-gray-800 mb-4">
            Welcome back!
        </h2>

        <p class="text-lg text-gray-600 max-w-xl mb-10">
            Organize your tasks, plan your workflow, and stay productive — all in one place.
        </p>

        <a href="/boards"
           class="px-6 py-3 bg-blue-600 text-white rounded-xl shadow hover:bg-blue-700 transition text-lg font-medium">
            View Your Boards
        </a>
    </section>

</body>
</html>
