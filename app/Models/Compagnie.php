<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compagnie extends Model
{
    use HasFactory;

   

  
    public function sections()
    {
        return $this->belongsToMany(Section::class);
    }
  

}