@extends('main')

@section('title', '| View Post')

@section('content')
    <div class="col-md-8">
        <img src="{{ asset('images/' . $post->image) }}" alt="">
        <h1>{{ $post->title }}</h1>
        <p class="lead">{!! $post->body !!}  </p>
        <hr>
        <div class="tags">
            @foreach($post->tags as $tag)
                <span class="label label-default">{{ $tag->name }}</span>
            @endforeach
        </div>
        <div id="backend-comments">
            <h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th width="70px"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($post->comments as $comment)
                    <tr>
                        <td>{{ $comment->name }}</td>
                        <td>{{ $comment->email }}</td>
                        <td>{{ $comment->comment }}</td>
                        <td>
                            <a href="{{route('comments.edit', $comment->id)}}"><span class="glyphicon glyphicon-pencil" style="margin-right:7px;"></span></a>
                            <a href="{{ route('comments.delete', $comment->id) }}"><span class="glyphicon glyphicon-trash"></span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-4">
        <div class="well">
            <dl class="dl-horizontal">
                <label>URL:</label>
                <p><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></p>
                <label>Category:</label>
                <p>{{ $post->category->name }}</p>
                <label>Created At:</label>
                <p>{{ date('M j, Y H:i', strtotime($post->created_at)) }}</p>
                <label>Last Updated:</label>
                <p>{{ date('M j, Y H:i', strtotime($post->updated_at)) }}</p>
            </dl>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-block">Edit</a>
                </div>
                <div class="col-sm-6">
                    <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                        <input type="submit" value="Delete" class="btn btn-danger btn-block">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>﻿
                </div>
            </div>﻿
            <div class="row">
                <div class="col-sm-12">
                    <br>
                    <a href="{{ route('posts.index') }}" class="btn btn-default btn-block">Show all Posts</a>
                </div>
            </div>
        </div>
    </div>
@endsection