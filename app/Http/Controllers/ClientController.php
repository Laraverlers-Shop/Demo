<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $query = Client::withCount('commandes');

        if ($request->filled('ville')) {
            $query->where('ville_client', $request->ville);
        }

        if ($request->filled('type')) {
            $query->where('type_client', $request->type);
        }

        $clients = $query->orderBy('nom_client')->get();
        $villes = Client::distinct()->pluck('ville_client');

        return view('clients.index', compact('clients', 'villes'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_client' => 'required|string|max:255',
            'ville_client' => 'required|string|max:255',
            'type_client' => 'required|in:particulier,entreprise',
            'remise_speciale' => 'nullable|numeric|between:0,100',
        ]);

        Client::create($validated);

        return redirect()->route('clients.index')
            ->with('success', 'Client créé avec succès !');
    }

    public function show(Client $client)
    {
        $client->load('commandes');
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'nom_client' => 'required|string|max:255',
            'ville_client' => 'required|string|max:255',
            'type_client' => 'required|in:particulier,entreprise',
            'remise_speciale' => 'nullable|numeric|between:0,100',
        ]);

        $client->update($validated);

        return redirect()->route('clients.index')
            ->with('success', 'Informations du client mises à jour !');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')
            ->with('success', 'Client supprimé !');
    }
}