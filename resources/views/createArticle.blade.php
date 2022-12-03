@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">      
            <h1>Create Article</h1>      
            <form action="{{ route('articles.store') }}" method="POST" class="my-4" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="">Article Title</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="form-group mb-3">
                    <label for="">Article Content</label>
                    <input type="text" class="form-control" name="content" required>
                </div>
                <div class="form-group mb-3">
                    <label for="">Article Image</label>
                    <input type="file" class="form-control" name="image" required>
                </div>
                <div class="form-group mb-3">
                    <label for="">Category</label>
                    <select name="category_id" id="" class="form-select">
                        @foreach ($categories as $category)
                            <option value="{{ $category['id'] }}" selected>{{ $category['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="">User</label>
                    <select name="user_id" id="" class="form-select">
                        @foreach ($users as $user)
                            <option value="{{ $user['id'] }}" selected>{{ $user['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-outline-dark">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection