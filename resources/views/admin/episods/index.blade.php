@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Episodes</h3>
    <a href="{{ route('admin.episodes.create') }}" class="btn btn-primary">+ Add Episode</a>
</div>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Series</th>
        <th>Actions</th>
    </tr>
    @foreach($episodes as $episode)
    <tr>
        <td>{{ $episode->id }}</td>
        <td>{{ $episode->title }}</td>
        <td>{{ $episode->series->title }}</td>
        <td>
            <a href="{{ route('admin.episodes.edit', $episode->id) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('admin.episodes.destroy', $episode->id) }}" method="POST" style="display:inline-block">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
