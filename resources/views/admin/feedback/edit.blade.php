@extends('admin.layouts.app')

@section('content')

<div class="container mt-5 mb-5">

    <h2>Update Product Feedback</h2>
    <hr>

    <form action="{{ route('feedback.update', $feedback->id) }}" enctype="multipart/form-data" method="POST">
    {{ csrf_field() }}
            {{ method_field('PUT') }}
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $feedback->title }}" placeholder="Enter title">
          </div>
          <div class="form-group mb-3">
                <label for="category_id">Category</label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach ($categories as $category)
                     <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
          </div>
          <div class="mb-3">
            <label for="discription" class="form-label">Description</label>
            <textarea class="form-control" name="discription" id="discription" placeholder="Enter Description">{{ $feedback->discription }}</textarea>
          </div>

          <button type="submit" class="btn btn-primary">Update Feedback</button>

    </form>

</div>


@endsection



