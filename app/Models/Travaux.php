<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travaux extends Model
{
    use HasFactory;
    protected $fillable = ['code','nom', 'unite_id', 'pu'];   


    public function unite()
    {
        return $this->belongsTo(Unite::class);
    }

    public function devisdetails()
    {
        return $this->hasMany(Devisdetails::class);
    }
}
