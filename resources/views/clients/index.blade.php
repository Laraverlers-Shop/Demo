@extends('layouts.app')

@section('title', 'Liste des Clients')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Liste des Clients</h1>
        
        <!-- Filter Form (GET Request Demo) -->
        <form method="GET" action="{{ route('clients.index') }}" class="flex gap-2">
            <select name="ville" class="border border-gray-300 rounded px-3 py-1.5 text-sm">
                <option value="">-- Toutes les villes --</option>
                @foreach($villes as $v)
                    <option value="{{ $v }}" {{ request('ville') == $v ? 'selected' : '' }}>{{ $v }}</option>
                @endforeach
            </select>
            
            <select name="type" class="border border-gray-300 rounded px-3 py-1.5 text-sm">
                <option value="">-- Tous les types --</option>
                <option value="particulier" {{ request('type') == 'particulier' ? 'selected' : '' }}>Particulier</option>
                <option value="entreprise" {{ request('type') == 'entreprise' ? 'selected' : '' }}>Entreprise</option>
            </select>
            
            <button type="submit" class="bg-indigo-600 text-white px-3 py-1.5 rounded text-sm">Filtrer</button>
        </form>
    </div>

    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="border-b bg-gray-50 text-gray-600 text-sm">
                <th class="p-3">Code</th>
                <th class="p-3">Nom</th>
                <th class="p-3">Ville</th>
                <th class="p-3">Type</th>
                <th class="p-3">Commandes</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($clients as $client)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3 font-mono text-sm">#{{ $client->code_client }}</td>
                    <td class="p-3 font-semibold text-indigo-600">
                        <a href="{{ route('clients.show', $client) }}">{{ $client->nom_client }}</a>
                        @if ($client->remise_speciale > 0)
                            <span class="ml-2 text-xs bg-yellow-100 text-yellow-800 px-2 py-0.5 rounded-full">
                                -{{ $client->remise_speciale }}%
                            </span>
                        @endif
                    </td>
                    <td class="p-3">{{ $client->ville_client }}</td>
                    <td class="p-3 capitalize">{{ $client->type_client }}</td>
                    <td class="p-3">
                        <span class="bg-gray-200 text-gray-800 text-xs px-2.5 py-1 rounded-full font-bold">
                            {{ $client->commandes_count }}
                        </span>
                    </td>
                    <td class="p-3 flex gap-2">
                        <a href="{{ route('clients.edit', $client) }}" class="text-blue-600 hover:underline text-sm">Éditer</a>
                        
                        <form method="POST" action="{{ route('clients.destroy', $client) }}" onsubmit="return confirm('Supprimer ce client ?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline text-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="p-4 text-center text-gray-500">Aucun client trouvé.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection