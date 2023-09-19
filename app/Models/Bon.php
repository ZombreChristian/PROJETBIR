<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bon extends Model
{
    use HasFactory;

    protected $fillable = [
        'personnel_id', // Ajoutez les autres attributs ici

    ];


    public function armes()
    {
        return $this->belongsToMany(Arme::class);
    }


    public function munitions()
    {
        return $this->belongsToMany(Munition::class);
    }


    public function optiques()
    {
        return $this->belongsToMany(Optique::class);
    }

    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
    }


    public function motos()
    {
        return $this->belongsToMany(Moto::class);
    }


    public function vehicules()
    {
        return $this->belongsToMany(Vehicule::class);
    }









}
