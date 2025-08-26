<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;
use App\Http\Resources\SeriesResource;
use App\Http\Resources\EpisodeResource;

class SeriesController extends Controller
{
    public function __construct()
    {
        // each method will automatically call the relevant policy method
        $this->authorizeResource(\App\Models\Series::class, 'series');
    }
    
    public function index()
    {
        $series = Series::with('categories','episodes')->get();
        return view('admin.series.index', compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.series.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'release_year' => 'nullable|integer',
            'cover_image' => 'nullable',
        ]);

               $data = $request->only(['title', 'description', 'release_year']); 

         if ($request->hasFile('cover_image')) {
        $path = $request->file('cover_image')->store('series', 'public');
        $data['cover_image'] = $path;
    }

        Series::create($request->all());
        return redirect()->route('admin.series.index')->with('success', 'Series created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function show(Series $series)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function edit(Series $series)
    {
        return view('admin.series.edit', compact('series'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Http\Response
     */
  public function update(Request $request, Series $series)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'release_year' => 'nullable|integer',
        'cover_image' => 'nullable',
    ]);

    $data = $request->only(['title', 'description', 'release_year']);

    if ($request->hasFile('cover_image')) {
        $path = $request->file('cover_image')->store('series', 'public');
        $data['cover_image'] = $path;
    }

    $series->update($data);

    return redirect()->route('admin.series.index')->with('success', 'Series updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function destroy(Series $series)
    {
        $series->delete();
        return redirect()->route('admin.series.index')->with('success', 'Series deleted successfully.');
    }
}
