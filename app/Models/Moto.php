<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moto extends Model
{
    use HasFactory;

    protected $fillable = [
        'noSerieMot', // Ajoutez les autres attributs ici
        'nom',

    ];

    public function bons()
{
    return $this->belongsToMany(Bon::class);
}
}
