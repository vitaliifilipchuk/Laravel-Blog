@extends('main')

@section('title')
    | Create New Post
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
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Post</h1>
            <hr>
            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input id="title" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="category_id">Category:</label>
                    <select class="form-control" name="category_id" id="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags">Tags:</label>
                    <select class="tags-select form-control" multiple="multiple" name="tags[]" title="tags">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="featured_image">Upload Featured Image</label>
                    <input type="file" name="featured_image" id="featured_image">
                </div>
                <div class="form-group">
                    <label for="body">Post Body:</label>
                    <textarea id="body" name="body" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="Create Post" class="btn btn-success btn-lg btn-block">
                </div>
                @include('partials.errors')
            </form>
        </div>
    </div>﻿
@endsection

@section('scripts')
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script type="text/javascript">
        $(".tags-select").select2();
    </script>
@endsection