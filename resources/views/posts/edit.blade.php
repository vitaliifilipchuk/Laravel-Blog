@extends('main')

@section('title')
    | Edit Blog Post
@endsection

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{asset('css/select2.min.css')}}">
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea'
        });
    </script>
@endsection

@section('content')
    <div class="row">
        <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input id="title" name="title" class="form-control" type="text" value="{{ $post->title }}" required>
                </div><div class="form-group">
                    <label for="slug">Slug:</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ $post->slug }}">
                </div>
                <div class="form-group">
                    <label for="category_id">Category:</label>
                    <select class="form-control" name="category_id" id="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                    @if($category->id == $post->category_id)
                                    selected = "selected"
                            @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags">Tags:</label>
                    <select class="tags-select form-control" multiple="multiple" name="tags[]" title="tags">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}"
                                    @if(in_array($tag->id, $selected_tags))
                                    selected
                                    @endif>{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="featured_image">Update Featured Image</label>
                    <input type="file" name="featured_image" id="featured_image">
                </div>
                <div class="form-group">
                    <label for="body">Body:</label>
                    <textarea class="form-control" id="body" name="body" rows="10">{{ $post->body }}</textarea>
                </div>
            </div>

            <div class="col-md-4">
                <div class="well">
                    <dl class="dl-horizontal">
                        <dt>Created At:</dt>
                        <dd>{{ date('M j, Y H:i', strtotime($post->created_at)) }}</dd>
                        <dt>Last Updated:</dt>
                        <dd>{{ date('M j, Y H:i', strtotime($post->updated_at)) }}</dd>
                    </dl>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-danger btn-block">Back</a>
                        </div>
                        <div class="col-sm-6">
                            {{ method_field('PUT') }}
                            <button type="submit" class="btn btn-success btn-block">Save</button>
                            {{ csrf_field() }}
                        </div>﻿
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script type="text/javascript">
        $(".tags-select").select2();
    </script>
@endsection