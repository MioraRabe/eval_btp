<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typemaison extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'description', 'duree','surface'];

    public function devis()
    {
        return $this->hasMany(Devis::class);
    }

    public function typemaisontravaux()
    {
        return $this->hasMany(Typemaisontravaux::class);
    }

    public function vue_typemaison_montant()
    {
        return $this->hasOne(Vue_typemaison_montant::class);
    }
}
