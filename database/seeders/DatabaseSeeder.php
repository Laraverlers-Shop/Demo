<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Client;
use App\Models\Commande;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create the Admin User for Login & Middleware demo
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@uca.ac.ma',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        // 2. Create a demo Client
        $client1 = Client::create([
            'nom_client' => 'Société Atlas Safi',
            'ville_client' => 'Safi',
            'type_client' => 'entreprise',
            'remise_speciale' => 10.00,
        ]);

        // 3. Create a demo Commande for the client
        Commande::create([
            'code_client' => $client1->code_client,
            'date_commande' => now(),
            'montant_total' => 15000.00,
        ]);

        // 4. Generate random clients using the factory
        Client::factory()->count(8)->create();
    }
}