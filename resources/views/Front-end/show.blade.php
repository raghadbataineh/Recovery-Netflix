@extends('Front-end.layout')

@section('title', $series->title)

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>{{ $series->title }}</h2>
        <p>{{ $series->description }}</p>
        <p>Release Year: {{ $series->release_year }}</p>

        @if($series->cover_image)
            <img src="{{ asset('storage/' . $series->cover_image) }}" alt="{{ $series->title }}" class="img-fluid mb-3" width="300">
        @endif

        <h3>Episodes</h3>
@if($series->episodes->count() > 0)
    <ul class="list-group">
        @foreach($series->episodes as $episode)
            <li class="list-group-item">
                <a href="{{ route('front.episode.show', $episode->id) }}">
                    Episode {{ $episode->episode_number ?? $loop->iteration }}: {{ $episode->title }}
                </a>
            </li>
        @endforeach
    </ul>
@else
    <p>No episodes available.</p>
@endif

    </div>
</div>
@endsection
