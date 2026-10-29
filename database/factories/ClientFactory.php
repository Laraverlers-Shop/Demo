<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    protected $model = Client::class;

    public function definition(): array
    {
        return [
            'nom_client' => fake()->company(),
            'ville_client' => fake()->randomElement(['Safi', 'Casablanca', 'Marrakech', 'Rabat', 'Tanger']),
            'type_client' => fake()->randomElement(['particulier', 'entreprise']),
            'remise_speciale' => fake()->numberBetween(0, 20),
        ];
    }
}