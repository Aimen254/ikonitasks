@extends('admin.layouts.app')

@section('content')

<div class="container mt-5 mb-5">

    <h2>Update Product Category</h2>
    <hr>

    <form action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data" method="POST">
    {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
          </div>
          <button type="submit" class="btn btn-primary">Add Product Category</button>
    </form>

</div>


@endsection



