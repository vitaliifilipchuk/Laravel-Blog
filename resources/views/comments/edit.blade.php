@extends('main')

@section('title')
    | Edit Comment
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Edit Comment</h1>
            <form action="{{ route('comments.update', $comment->id) }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" title="name" class="form-control" disabled value="{{ $comment->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" title="email" class="form-control" disabled value="{{ $comment->email }}">
                </div>
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea name="comment" id="comment" rows="10" class="form-control">{{ $comment->comment }}</textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="Update Comment" class="btn btn-success btn-block">
                    {{ method_field('PUT') }}
                </div>
            </form>
        </div>
    </div>
@endsection