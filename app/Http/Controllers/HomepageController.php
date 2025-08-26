<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Series;
use App\Models\Episod;

class HomepageController extends Controller
{
    public function index() {
    $categories = Category::all();
    $series = Series::all();
    return view('Front-end.index', compact('categories', 'series'));
}

public function byCategory($id) {
    $categories = Category::all();
    $category = Category::findOrFail($id);
    $series = $category->series; // Access series related to the category
    return view('Front-end.index', compact('categories', 'series'));    
}

public function show($id)
{
    $series = Series::with('episodes')->findOrFail($id); 
    return view('Front-end.show', compact('series'));
}

public function showEpisode($id)
    {
        $episode = Episod::findOrFail($id);
        return view('Front-end.episode-show', compact('episode'));
    }

}