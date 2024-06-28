<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typefinition extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'augmentation'];

    public function devis()
    {
        return $this->hasMany(Devis::class);
    }
}
