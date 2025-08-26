<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Series;


class SeriesApiController extends Controller
{
    public function index()
    {
        $series=Series::with('categories', 'episods')->paginate(10);
        return SeriesResource::collection($series);
    }

    public function show(Series $series)
    {
        $series->load(['categories','episodes']);
        return new SeriesResource($series);
    }
}
