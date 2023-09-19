<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arme extends Model
{
    use HasFactory;
    protected $fillable = [
        'noSerieArme', // Ajoutez les autres attributs ici
        'nom',
        'marque',
        'type',
        'date',
        'etat',
        'provenance',
    ];

    public function typeArme()
    {
        return $this->belongsTo(TypeArme::class, 'type');
    }


    public function bons()
{
    return $this->belongsToMany(Bon::class);
}
}
