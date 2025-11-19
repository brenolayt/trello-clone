<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Todo List</title>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- NAVBAR -->
    <x-nav-bar></x-nav-bar>

    <!-- MAIN WRAPPER -->
    <div class="flex h-[calc(100vh-64px)]">

        <!-- SIDEBAR (optional, can be removed later) -->
        <aside class="w-64 bg-white border-r hidden md:block">
            <div class="p-6">
                <h2 class="text-lg font-semibold text-gray-700">Workspace</h2>

                <nav class="mt-6 space-y-3">
                    <a href="#"
                        class="block px-3 py-2 rounded-lg hover:bg-gray-100 text-gray-600">
                        My Boards
                    </a>

                    <a href="#"
                        class="block px-3 py-2 rounded-lg hover:bg-gray-100 text-gray-600">
                        Favorites
                    </a>

                    <a href="#"
                        class="block px-3 py-2 rounded-lg hover:bg-gray-100 text-gray-600">
                        Settings
                    </a>
                </nav>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="flex-1 p-6 overflow-y-auto">

            <!-- PAGE HEADER -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Your Todo Boards</h1>
                    <p class="text-gray-500 mt-1">Organize your tasks however you prefer.</p>
                </div>

                <button
                    class="bg-blue-600 text-white px-5 py-2.5 rounded-lg hover:bg-blue-700 shadow-sm">
                    + Create New Board
                </button>
            </div>

            <!-- BOARDS WRAPPER (empty for now, you will fill later) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Example board (temporary placeholder) -->
                <x-todo-board title="boa pergunta">
                    <x-todo-card text="teste"></x-todo-card>
                    <x-todo-card text="teste2"></x-todo-card>
                    <x-todo-card text="teste3"></x-todo-card>
                </x-todo-board>

            </div>

        </main>

    </div>

</body>

</html>