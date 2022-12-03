@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Categories</h1>
            <a href="{{ route('categories.create') }}" class="btn btn-outline-success">Create</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>User</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->user->name }}</td>
                        <td class="d-flex gap-2">
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-outline-warning">Edit</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h1>Articles</h1>
            <a href="{{ route('articles.create') }}" class="btn btn-outline-success">Create</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Category</th>
                        <th>User</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                    <tr>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->content }}</td>
                        <td>{{ $article->category->name }}</td>
                        <td>{{ $article->user->name }}</td>
                        <td>
                            <img src="{{ asset('storage/'.$article->image) }}" alt="" height=100>
                        </td>
                        <td>
                            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-outline-warning">Edit</a>
                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger mt-2">Delete</button>
                            </form>                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
