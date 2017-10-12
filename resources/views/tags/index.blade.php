@extends('main')

@section('title')
    | All Tags
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Tags</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <th>{{ $tag->id }}</th>
                        <td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-3">
            <div class="well">
                <form action="{{ route('tags.store') }}" method="POST">
                    {{ csrf_field() }}
                    <h2>New Tag</h2>
                    <div class="form-group">
                        <label name="name">Name:</label>
                        <input id="name" name="name" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Create Tag" class="btn btn-primary btn-block">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection