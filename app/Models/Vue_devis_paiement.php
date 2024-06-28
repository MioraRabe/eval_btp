<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vue_devis_paiement extends Model
{
    use HasFactory;
    protected $table = 'vue_devis_paiement';

    public function devis()
    {
        return $this->belongsTo(Devis::class);
    }
}
