@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">            
            <h1>Create Article</h1>      
            <form action="{{ route('categories.store') }}" method="POST" class="my-4">
                @csrf
                <div class="form-group mb-3">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" required>
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