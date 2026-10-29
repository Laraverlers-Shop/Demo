<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Commande;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user for testing Auth & Middleware
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@est.ma',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        // Demo Client 1
        $client1 = Client::create([
            'nom_client' => 'Société Atlas Safi',
            'ville_client' => 'Safi',
            'type_client' => 'entreprise',
            'remise_speciale' => 10.00,
        ]);

        Commande::create([
            'code_client' => $client1->code_client,
            'date_commande' => now()->subDays(2),
            'montant_total' => 15000.00,
        ]);

        // Additional dummy clients
        Client::factory()->count(8)->create();
    }
}