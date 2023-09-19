<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;
    protected $guarded = [];
    
  


    public function sections()
{
    return $this->belongsToMany(Section::class, 'section_groupe', 'groupe_id', 'section_id');
}
}