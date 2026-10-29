<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;

    protected $primaryKey = 'code_client';

    protected $fillable = [
        'nom_client',
        'ville_client',
        'type_client',
        'remise_speciale',
    ];

    public function commandes(): HasMany
    {
        return $this->hasMany(Commande::class, 'code_client', 'code_client');
    }
}