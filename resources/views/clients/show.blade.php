@extends('layouts.app')

@section('title', 'Détails du Client')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md max-w-2xl mx-auto">
    <div class="flex justify-between items-start mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">{{ $client->nom_client }}</h1>
            <p class="text-sm text-gray-500">Ville: {{ $client->ville_client }} | Type: {{ ucfirst($client->type_client) }}</p>
        </div>
        <a href="{{ route('clients.index') }}" class="text-sm text-indigo-600 hover:underline">&larr; Retour à la liste</a>
    </div>

    <h2 class="text-lg font-semibold mb-3 border-b pb-2">Commandes associées (Eloquent Relation)</h2>
    <ul class="divide-y">
        @forelse ($client->commandes as $commande)
            <li class="py-3 flex justify-between items-center">
                <div>
                    <p class="font-medium">Commande #{{ $commande->code_commande }}</p>
                    <p class="text-xs text-gray-500">Date: {{ $commande->date_commande }}</p>
                </div>
                <span class="font-bold text-green-600">{{ number_format($commande->montant_total, 2) }} DH</span>
            </li>
        @empty
            <li class="py-3 text-gray-500 text-sm">Aucune commande enregistrée pour ce client.</li>
        @endforelse
    </ul>
</div>
@endsection