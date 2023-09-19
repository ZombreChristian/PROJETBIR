<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fonction extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function personnels()
{
    return $this->belongsToMany(Personnels::class,'personnel_fonction', 'fonction_id', 'personnel_id');
}



}