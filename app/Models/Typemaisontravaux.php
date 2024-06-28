<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typemaisontravaux extends Model
{
    use HasFactory;
    protected $fillable = ['typemaison_id', 'travaux_id', 'quantite'];

    public function typemaison()
    {
        return $this->belongsTo(Typemaison::class);
    }
    public function travaux()
    {
        return $this->belongsTo(Travaux::class);
    }
}
