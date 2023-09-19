<?php

namespace App\Models\permanence;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visiteurs extends Model
{
    use HasFactory;
  

    protected $guarded = [];
    public function service()

    {
        return $this->belongsTo(Services::class, 'vis_ser');
    }
   
}
