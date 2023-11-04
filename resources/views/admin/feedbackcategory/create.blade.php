@extends('layouts.app')

@section('content')

<div class="container mt-5 mb-5">

    <h2>Create Product Category</h2>
    <hr>

    <form action="{{ route('feebackcategory.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
          </div>
          <button type="submit" class="btn btn-primary">Add Product Category</button>

    </form>

</div>


@endsection



