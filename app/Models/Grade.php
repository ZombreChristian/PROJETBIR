<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Grade extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function cat()
{
    return $this->belongsTo(Categorie::class,'categorie');
}

public function personnels()
{
    return $this->hasMany(Personnel::class,'grade');
}
}