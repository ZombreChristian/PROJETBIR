<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeArme extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',


    ];

    public function armes()
    {
        return $this->hasMany(Arme::class, 'type');
    }
}
