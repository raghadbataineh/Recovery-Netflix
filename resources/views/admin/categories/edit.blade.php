@extends('admin.layout')

@section('title' , 'Edit Category')

@section('content')
    <h2>Edit Category</h2>

    <form method="POST" action="{{ route('admin.categories.update' , $category->id) }}">
        @csrf 
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" 
                   name="name" 
                   class="form-control" 
                   value="{{ old('name' , $category->name) }}" 
                   required>
            @error ('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
