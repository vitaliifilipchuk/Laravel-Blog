@extends('main')

@section('title')
    | All Categories
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Categories</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <th>{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-3">
            <div class="well">
                <form action="{{ route('categories.store') }}" method="POST">
                    {{ csrf_field() }}
                    <h2>New Category</h2>
                    <div class="form-group">
                        <label name="name">Name:</label>
                        <input id="name" name="name" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Create Category" class="btn btn-primary btn-block">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection