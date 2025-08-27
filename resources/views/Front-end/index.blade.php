@extends('Front-end.layout')

@section('title', 'Home')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h2 class="mb-3">Categories</h2>
        @foreach($categories as $category)
            <a href="{{ route('front.series.byCategory', $category->id) }}" class="btn btn-outline-primary category-btn">
                {{ $category->name }}
            </a>
        @endforeach
    </div>
</div>

<div class="row">
    <h2 class="mb-3">All Series</h2>
    @forelse($series as $s)
        <div class="col-md-3 mb-4">
            <div class="card series-card">
                @if($s->cover_image)
                    <img src="{{ asset('storage/' . $s->cover_image) }}" class="card-img-top" alt="{{ $s->title }}">
                @else
                    <p>Not found</p>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $s->title }}</h5>
                    <p class="card-text">{{ Str::limit($s->description, 60) }}</p>
                    <a href="{{ route('home.show', $s->id) }}" class="btn btn-primary btn-sm">View Details</a>

                    @auth
                        <form action="{{ route('favorites.toggle', $s->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm {{ auth()->user()->favorites->contains($s->id) ? 'btn-danger' : 'btn-outline-danger' }}">
                                {{ auth()->user()->favorites->contains($s->id) ? 'Remove Favorite' : 'Add to Favorite' }}
                            </button>
                        </form>
                    @endauth

                </div>
            </div>
        </div>
    @empty
        <p>No series available.</p>
    @endforelse
</div>
@endsection
