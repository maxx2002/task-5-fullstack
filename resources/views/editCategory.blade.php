@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Edit {{ $category->name }} Category</h1>      
            <form action="{{ route('categories.update', $category->id) }}" method="POST" class="my-4">
                @csrf
                @method('put')
                <div class="form-group mb-3">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $category->name }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="">User</label>
                    <select name="user_id" id="" class="form-select">
                        @foreach ($users as $user)
                            @if ($user['id'] == $category['user_id'])
                                <option value="{{ $user['id'] }}" selected>{{ $user['name'] }}</option>
                            @else
                                <option value="{{ $user['id'] }}" selected>{{ $user['name'] }}</option> 
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