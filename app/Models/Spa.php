<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spa extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function personnels()
    {
        return $this->belongsToMany(Personnel::class,'personnel_spa', 'spa_id', 'personnel_id');
    }
}