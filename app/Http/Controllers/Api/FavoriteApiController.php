<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Series;
use Illuminate\Support\Facades\Auth;

class FavoriteApiController extends Controller
{
     public function index(Request $r)
    {
        $favorites = $r->user()->favorites()->with('categories','episodes')->get();
        return SeriesResource::collection($favorites);
    }

    public function store(Request $r)
    {
        $r->validate(['series_id'=>'required|exists:series,id']);
        $r->user()->favorites()->syncWithoutDetaching([$r->series_id]);
        // This for API response
        return response()->json(['message'=>'Added to favorites'], 201);
    }

       public function toggle(Series $series)
    {
        $user = auth()->user();

        if ($user->favorites->contains($series->id)) {
            // Remove from favorites
            $user->favorites()->detach($series->id);
        } else {
            // Add to favorites
            $user->favorites()->attach($series->id);
        }

        return back()->with('success', 'Added to favorites!');
    }
}
