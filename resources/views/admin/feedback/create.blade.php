@extends('admin.layouts.app')

@section('content')

<div class="container mt-5 mb-5">

    <h2>Create Product Feedback</h2>
    <hr>

    <form action="{{ route('feedbackk.store',$id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">
          </div>
          <div class="mb-3">
            <label for="discription" class="form-label">Discription</label>
            <textarea class="form-control" name="discription" cols="30" rows="10" placeholder="Add Descriptions..."></textarea>
          </div>
          <div class="form-group mb-3">
                <label for="category_id">Category</label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach ($categories as $category)
                     <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
          </div>
          <button type="submit" class="btn btn-primary">Add Product Feedback</button>

    </form>

</div>


@endsection



