<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;
    protected $guarded = [];

    // the series has many episodes 
      public function episodes()
    {
        return $this->hasMany(Episod::class)->latest('release_date');
    }

    // many-to-many relationship with User for favorites
    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }

    // many-to-many relationship with Category
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_series');
    }


}
