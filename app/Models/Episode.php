<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
protected $table = 'episods';

     protected $guarded = [];

    // each episode belongs to a series 
         public function series() { 
            return $this->belongsTo(Series::class);
         }


}
