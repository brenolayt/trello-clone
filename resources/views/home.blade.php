<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trello Clone | Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-800">

    <x-nav-bar>

    </x-nav-bar>
    
    <div class="w-full bg-blue-50 text-center py-2 text-sm text-blue-700 font-medium">
        Accelerate your team's productivity with AI features — now available!
    </div>

    <!-- HERO SECTION -->
    <section class="max-w-7xl mx-auto px-6 py-20 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        <!-- LEFT: TEXT -->
        <div>
            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight text-gray-900">
                Reúna, organize e resolva suas tarefas<br>de qualquer lugar.
            </h1>

            <p class="text-gray-600 mt-6 text-lg">
                Fuja da bagunça e do caos. Seja mais produtivo com o Trello Clone.
            </p>

            <!-- EMAIL SIGNUP -->
            <form class="mt-8 space-y-4 max-w-md">
                <input type="email"
                    placeholder="E-mail"
                    class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">

                <button type="submit"
                    class="w-full bg-blue-600 text-white px-4 py-3 rounded-lg shadow hover:bg-blue-700 text-lg font-medium">
                    Criar conta – é grátis!
                </button>
            </form>

            <p class="text-gray-500 mt-4 text-sm">
                Ao inserir meu e-mail, declaro conhecer a Política de Privacidade.
            </p>
        </div>

        <!-- RIGHT: IMAGE -->
        <div class="flex justify-center relative">
            <!-- Optional background shape -->
            <div class="absolute -z-10 w-64 h-64 bg-purple-300 rounded-xl transform rotate-12 opacity-40"></div>

            <img src="{{ asset('images/phone2.png') }}"
                class="w-200 drop-shadow-xl rounded-3xl"
                alt="App Preview">
        </div>
    </section>

</body>
</html>
