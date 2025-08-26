<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return response()->json(['message'=>'Added to favorites'], 201);
    }
}
