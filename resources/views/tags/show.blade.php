@extends('main')

@section('title')
    {{ $tag->name }} Tag
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $tag->name }} Tag <small>{{ $tag->posts()->count() }} Posts</small></h1>
        </div>
        <div class="col-md-2">
            <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary btn-h1-spacing btn-block">Edit</a>
        </div>
        <div class="col-md-2">
            <form action="{{ route('tags.destroy', $tag->id) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    {{ method_field('DELETE') }}
                    <input type="submit" value="Delete" class="btn btn-danger btn-block btn-h1-spacing">
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Tags</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($tag->posts as $post)
                        <tr>
                            <th>{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>@foreach($post->tags as $tag)
                                    <span class="label label-default">{{ $tag->name }}</span>
                                @endforeach
                            </td>
                            <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-xs">View</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection