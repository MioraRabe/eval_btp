<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    use HasFactory;
    protected $fillable=['ref','client_id', 'datecreation', 'typemaison_id', 'typefinition_id', 'augmentation','datedebuttravaux','lieu_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function typemaison()
    {
        return $this->belongsTo(Typemaison::class);
    }
    public function typefinition()
    {
        return $this->belongsTo(Typefinition::class);
    }
    public function lieu(){
        return $this->belongsTo(Lieu::class);
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }

    public function Devisdetails(){
        return $this->hasMany(Devisdetails::class);
    }

    public function vue_devis_montant(){
        return $this->hasOne(Vue_devis_montant::class);
    }

    public function vue_devis_paiement(){
        return $this->hasOne(Vue_devis_paiement::class);
    }
    
}
