@extends('layouts.app')

@section('title', 'Connexion')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md mt-10">
    <h1 class="text-2xl font-bold mb-6 text-gray-800 text-center">Connexion à l'application</h1>

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700">Adresse E-mail</label>
            <input type="email" name="email" value="admin@uca.ac.ma" class="mt-1 w-full border border-gray-300 rounded p-2" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Mot de passe</label>
            <input type="password" name="password" value="password" class="mt-1 w-full border border-gray-300 rounded p-2" required>
        </div>

        <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded font-semibold hover:bg-indigo-700">
            Se connecter
        </button>
    </form>
</div>
@endsection