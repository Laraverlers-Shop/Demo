<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Commande extends Model
{
    use HasFactory;

    protected $primaryKey = 'code_commande';

    protected $fillable = [
        'code_client',
        'date_commande',
        'montant_total',
        'bon_commande',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'code_client', 'code_client');
    }
}