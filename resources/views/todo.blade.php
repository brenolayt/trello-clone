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

                <div x-data="{ open: false, title: '' }">

                    <!-- CREATE BUTTON -->
                    <button
                        @click="open = true"
                        class="bg-blue-600 text-white px-5 py-2.5 rounded-lg hover:bg-blue-700 shadow-sm">
                        + Create New Board
                    </button>

                    <!-- POPUP / INPUT -->
                    <div
                        x-show="open"
                        x-transition
                        class="fixed inset-0 flex items-center justify-center bg-black/40 z-50">
                        <div class="bg-white p-6 rounded-lg shadow-lg w-80">

                            <h2 class="text-xl font-semibold mb-3">New Board</h2>

                            <form method="POST" action="{{ route('todo.create-board') }}">
                                @csrf

                                <input type="text"
                                    name="title"
                                    x-model="title"
                                    placeholder="Board name…"
                                    class="w-full border rounded-lg px-3 py-2 focus:ring focus:outline-none"
                                    required />

                                <div class="flex justify-end gap-3 mt-4">
                                    <button type="button"
                                        @click="open = false; title = ''"
                                        class="px-4 py-2 rounded-lg bg-gray-200 hover:bg-gray-300">
                                        Cancel
                                    </button>

                                    <button type="submit"
                                        class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700">
                                        Create
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>

            </div>

            <!-- BOARDS WRAPPER (empty for now, you will fill later) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach(auth()->user()->userTodos as $todo)
                <x-todo-board title="{{ $todo->title }}" id="{{ $todo->id }}">
                    @foreach($todo->cards as $cards)
                    <x-todo-card text="{{ $cards->text }}" id="{{$cards->id}}"></x-todo-card>
                    @endforeach
                </x-todo-board>
                @endforeach
            </div>

        </main>

    </div>

</body>

</html>