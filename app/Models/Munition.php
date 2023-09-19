<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Munition extends Model
{
    use HasFactory;

    protected $fillable = [
        'noSerieMuni', // Ajoutez les autres attributs ici
        'nom',
        'marque',
        'type',
        'date',
        'etat',
        'quantite',

    ];

    public function bons()
{
    return $this->belongsToMany(Bon::class);
}

}
