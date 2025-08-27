<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use Illuminate\Http\Request;
use App\Models\Series;
use App\Http\Resources\SeriesResource;
use App\Http\Resources\EpisodeResource;

class EpisodController extends Controller
{

     public function __construct()
    {
        $this->authorizeResource(\App\Models\Episode::class, 'episode');
    }


    public function index()
    {
        $episodes = Episode::with('series')->get();
        return view('admin.episods.index', compact('episodes'));
    }

    public function create()
    {
        $series = Series::all(); 
        return view('admin.episods.create', compact('series'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'series_id' => 'required|exists:series,id',
            'title' => 'required|string|max:255',
            'video_url' => 'required|string',
        ]);

        Episod::create($request->all());
        return redirect()->route('admin.episodes.index')->with('success', 'Episode created successfully.');
    }

    public function edit(Episode $episode)
    {
        $series = Series::all();
        return view('admin.episods.edit', compact('episode', 'series'));
    }

    public function update(Request $request, Episode $episode)
    {
        $request->validate([
            'series_id' => 'required|exists:series,id',
            'title' => 'required|string|max:255',
            'video_url' => 'required|string',
        ]);

        $episode->update($request->all());
        return redirect()->route('admin.episodes.index')->with('success', 'Episode updated successfully.');
    }

    public function destroy(Episode $episode)
    {
        $episode->delete();
        return redirect()->route('admin.episodes.index')->with('success', 'Episode deleted successfully.');
    }
}
