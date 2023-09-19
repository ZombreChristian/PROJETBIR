<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'nomSection', // Add nomSection to the fillable array
        // Other properties that can be mass assigned go here
    ];

    
    public function compagnies()
    {
        return $this->belongsToMany(Compagnie::class);
    }
public function groupes() 
{ return $this->belongsToMany(Groupe::class, 'section_groupe', 'section_id', 'groupe_id');

}
}