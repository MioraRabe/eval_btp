<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lieu extends Model
{
    use HasFactory;
    protected $fillable = ['nom'];

    public function devis(){
        return $this->hasMany(Devis::class);
    }
}
