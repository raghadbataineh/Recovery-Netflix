@extends('Front-end.layout')

@section('title', $episode->title)

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>{{ $episode->title }}</h2>
        <p>{{ $episode->description }}</p>

        @if($episode->video_path)
            <video width="100%" controls>
                <source src="{{ asset('storage/' . $episode->video_path) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        @else
            <p>No video available for this episode.</p>
        @endif

        <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Back to Series</a>
    </div>
</div>
@endsection
