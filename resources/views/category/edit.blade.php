@extends('dashboard.master')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Category</h2>

    <form action="{{route('category.update',['category' => $category->id])}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Category Name</label>
            <input type="text" class="form-control" id="category" value="{{$category->name}}" name="name" placeholder="Enter Category" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
</div>

@endsection