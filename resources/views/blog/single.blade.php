@extends('main')

@section('title')
    | {{ $post->title }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <img src="{{ asset('images/' . $post->image) }}" height="400" width="800" alt="">
            <h1>{{ $post->title }}</h1>
            <p>{!! $post->body !!}</p>
            <hr>
            <p>Posted In: {{ $post->category->name }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3 class="comments-title"><span class="glyphicon glyphicon-comment"></span>  {{ $post->comments()->count() }} Comments</h3>
            @foreach($post->comments as $comment)
                <div class="comment">
                    <div class="author-info">
                        <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=monsterid" }}" class="author-image">
                        <div class="author-name">
                            <h4>{{ $comment->name }}</h4>
                            <p class="author-time">{{ date('F nS, Y - g:iA' ,strtotime($comment->created_at)) }}</p>
                        </div>
                    </div>
                    <div class="comment-content">
                        {{ $comment->comment }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row col-md-8 col-md-offset-2">
        <form action="{{ route('comments.store', $post->id) }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="col-md-6">
                    <label for="name">Name:</label>
                    <input type="text" name="name" title="name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                    <label for="email">Email:</label>
                    <input type="text" name="email" title="email" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label for="comment">Comment:</label>
                    <textarea name="comment" title="comment" class="form-control" rows="5"></textarea>
                    <input type="submit" class="btn btn-success btn-block btn-h1-spacing" value="Add Comment">
                </div>
            </div>
        </form>
    </div>

@endsection