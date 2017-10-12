@extends('main')

@section('title')
    | Edit Tag
@endsection

@section('content')
    <form action="{{ route('tags.update', $tag->id) }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name:</label>
            <textarea class="form-control" id="name" name="name" rows="1">{{ $tag->name }}</textarea>
        </div>
        <div class="form-group">
            {{ method_field('PUT') }}
            <button type="submit" class="btn btn-success">Save Changes</button>
        </div>
    </form>
@endsection