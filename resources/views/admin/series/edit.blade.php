@extends('admin.layout')

@section('title' , 'Edit Series')

@section('content')
    <h2>Edit Series</h2>

    <form method="POST" action="{{ route('admin.series.update' , $series->id) }}" enctype="multipart/form-data">
        @csrf 
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" 
                   name="title" 
                   class="form-control" 
                   value="{{ old('title' , $series->title) }}" 
                   required>
            @error ('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description', $series->description) }}</textarea>
            @error ('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Cover Image</label>
            <input type="file" name="cover_image" class="form-control">
            @if($series->cover_image)
                <small class="d-block mt-1">Current: <img src="{{ asset('storage/' . $series->cover_image) }}" alt="" width="100"></small>
            @endif
            @error ('cover_image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="active" {{ old('status', $series->status) == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $series->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error ('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
