<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Optique extends Model
{
    use HasFactory;

    protected $fillable = [
        'noSerieOpt', // Ajoutez les autres attributs ici
        'nom',
        'type',
        'date',


    ];

    public function bons()
{
    return $this->belongsToMany(Bon::class);
}
}
