<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestion Commerciale') - Laravel Demo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <nav class="bg-indigo-700 p-4 text-white shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('clients.index') }}" class="font-bold text-xl tracking-tight">
                Laravel LP-ISIR Demo
            </a>
            <div class="space-x-4 flex items-center">
                @auth
                    <a href="{{ route('clients.index') }}" class="hover:underline">Clients</a>
                    <a href="{{ route('clients.create') }}" class="bg-green-500 hover:bg-green-600 px-3 py-1.5 rounded text-sm font-semibold">
                        + Nouveau Client
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-red-200 hover:text-white text-sm cursor-pointer">Déconnexion</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="bg-indigo-500 hover:bg-indigo-600 px-3 py-1.5 rounded text-sm font-semibold">Connexion</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container mx-auto mt-6 px-4">
        @include('partials.flash')
        
        {{-- THIS IS THE CRITICAL LINE THAT RENDERS login.blade.php --}}
        @yield('content')
    </main>
</body>
</html>