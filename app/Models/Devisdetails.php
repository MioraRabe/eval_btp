<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devisdetails extends Model
{
    use HasFactory;
    protected $fillable=['devis_id', 'travaux_id', 'quantite', 'pu', 'montant'];

    public function devis()
    {
        return $this->belongsTo(Devis::class);
    }
    public function travaux()
    {
        return $this->belongsTo(Travaux::class);
    }
}
