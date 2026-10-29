@extends('layouts.app')

@section('title', 'Modifier le Client')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-xl font-bold mb-4 text-gray-800">Modifier le client : {{ $client->nom_client }}</h1>

    <form method="POST" action="{{ route('clients.update', $client) }}" class="space-y-4">
        @csrf
        @method('PUT') {{-- Required for update requests in Laravel --}}

        <div>
            <label class="block text-sm font-medium text-gray-700">Nom du client</label>
            <input type="text" name="nom_client" value="{{ old('nom_client', $client->nom_client) }}" class="mt-1 w-full border border-gray-300 rounded p-2 focus:ring-indigo-500 focus:border-indigo-500">
            @error('nom_client')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Ville</label>
            <input type="text" name="ville_client" value="{{ old('ville_client', $client->ville_client) }}" class="mt-1 w-full border border-gray-300 rounded p-2 focus:ring-indigo-500 focus:border-indigo-500">
            @error('ville_client')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Type de client</label>
            <select name="type_client" class="mt-1 w-full border border-gray-300 rounded p-2">
                <option value="particulier" {{ old('type_client', $client->type_client) == 'particulier' ? 'selected' : '' }}>Particulier</option>
                <option value="entreprise" {{ old('type_client', $client->type_client) == 'entreprise' ? 'selected' : '' }}>Entreprise</option>
            </select>
            @error('type_client')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Remise spéciale (%)</label>
            <input type="number" step="0.01" name="remise_speciale" value="{{ old('remise_speciale', $client->remise_speciale) }}" class="mt-1 w-full border border-gray-300 rounded p-2">
            @error('remise_speciale')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-between items-center pt-2">
            <a href="{{ route('clients.index') }}" class="text-gray-500 text-sm hover:underline">Annuler</a>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded font-semibold hover:bg-indigo-700">
                Mettre à jour
            </button>
        </div>
    </form>
</div>
@endsection