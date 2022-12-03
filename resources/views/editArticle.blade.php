@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Edit Article</h1>      
            <form action="{{ route('articles.update', $article->id) }}" method="POST" class="my-4" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="hidden" name="oldImage" value="{{ $article->image }}">
                <div class="form-group mb-3">
                    <label for="">Article Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $article->title }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="">Article Content</label>
                    <input type="text" class="form-control" name="content" value="{{ $article->content }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="">Article Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="form-group mb-3">
                    <label for="">Category</label>
                    <select name="category_id" id="" class="form-select">
                        @foreach ($categories as $category)
                            @if ($category['id'] == $article['category_id'])
                                <option value="{{ $category['id'] }}" selected>{{ $category['name'] }}</option>
                            @else
                                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="">User</label>
                    <select name="user_id" id="" class="form-select">
                        @foreach ($users as $user)
                            @if ($user['id'] == $article['user_id'])
                                <option value="{{ $user['id'] }}" selected>{{ $user['name'] }}</option>
                            @else
                                <option value="{{ $user['id'] }}">{{ $user['name'] }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-outline-dark">Submit</button>
            </form>            
        </div>
    </div>
</div>
@endsection