<?php

namespace App\Http\Controllers;

use App\Models\Episod;
use Illuminate\Http\Request;
use App\Models\Series;
use App\Http\Resources\SeriesResource;
use App\Http\Resources\EpisodeResource;

class EpisodController extends Controller
{

     public function __construct()
    {
        $this->authorizeResource(\App\Models\Episod::class, 'episode');
    }


    public function index()
    {
        $episodes = Episod::with('series')->get();
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

    public function edit(Episod $episode)
    {
        $series = Series::all();
        return view('admin.episods.edit', compact('episode', 'series'));
    }

    public function update(Request $request, Episod $episode)
    {
        $request->validate([
            'series_id' => 'required|exists:series,id',
            'title' => 'required|string|max:255',
            'video_url' => 'required|string',
        ]);

        $episode->update($request->all());
        return redirect()->route('admin.episodes.index')->with('success', 'Episode updated successfully.');
    }

    public function destroy(Episod $episode)
    {
        $episode->delete();
        return redirect()->route('admin.episodes.index')->with('success', 'Episode deleted successfully.');
    }
}
