@extends('admin.layout')

@section('title' , 'Edit Episode')

@section('content')
    <h2>Edit Episode</h2>

    <form method="POST" action="{{ route('admin.episodes.update' , $episode->id) }}">
        @csrf 
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Series</label>
            <select name="series_id" class="form-control" required>
                @foreach($series as $s)
                    <option value="{{ $s->id }}" {{ old('series_id', $episode->series_id) == $s->id ? 'selected' : '' }}>
                        {{ $s->title }}
                    </option>
                @endforeach
            </select>
            @error('series_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" 
                   name="title" 
                   class="form-control" 
                   value="{{ old('title' , $episode->title) }}" 
                   required>
            @error ('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description', $episode->description) }}</textarea>
            @error ('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Video URL</label>
            <input type="url" 
                   name="video_url" 
                   class="form-control" 
                   value="{{ old('video_url', $episode->video_url) }}" 
                   required>
            @error ('video_url')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Duration (minutes)</label>
            <input type="number" 
                   name="duration" 
                   class="form-control" 
                   value="{{ old('duration', $episode->duration) }}" 
                   required>
            @error ('duration')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Release Date</label>
            <input type="date" 
                   name="release_date" 
                   class="form-control" 
                   value="{{ old('release_date', $episode->release_date) }}" 
                   required>
            @error ('release_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
