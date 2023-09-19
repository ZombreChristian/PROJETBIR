<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function fonctions()
    {
        return $this->belongsToMany(Fonction::class,'personnel_fonction', 'fonction_id', 'personnel_id');
    }
    public function spas()
{
    return $this->belongsToMany(Spa::class,'personnel_spa', 'spa_id', 'personnel_id');
}

public function grad()
{
    return $this->belongsTo(Grade::class,'grade');
}

public function bons()
{

    return $this->belongsTo(Bon::class);
}
}
