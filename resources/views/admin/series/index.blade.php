@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Series</h3>
    <a href="{{ route('admin.series.create') }}" class="btn btn-primary">+ Add Series</a>
</div>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>cover_image</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    @foreach($series as $s)
    <tr>
        <td>{{ $s->id }}</td>
        <td>{{ $s->title }}</td>
        <td>
            @if($s->cover_image)
                <img src="{{ asset('storage/' . $s->cover_image) }}" alt="Cover Image" width="100">
            @else
               not found
            @endif
        <td>{{ ucfirst($s->status) }}</td>
        <td>
            <a href="{{ route('admin.series.edit', $s->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('admin.series.destroy', $s->id) }}" method="POST" style="display:inline-block">
                @csrf 
                @method('DELETE')
                <button class="btn btn-sm btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection