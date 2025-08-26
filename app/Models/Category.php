<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
     protected $guarded = [];

    //  Many-to-Many relationship with Series
         public function series(){
             return $this->belongsToMany(Series::class,'category_series'); 
            }


}
