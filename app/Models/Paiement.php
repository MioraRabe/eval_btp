<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;
    protected $fillable=['ref','devis_id', 'date', 'montant'];

    public function devis()
    {
        return $this->belongsTo(Devis::class);
    }
}
