@extends('layouts.app')

@section('content')

<h1 class="text-center mt-2">All Products</h1>
<hr>
<br>


<div class="container">
    <div class="row">
        <div class="col-md-6" style="display:flex">
            @foreach ($products as $product)
            <div class="card m-2 p-2" style="width: 18rem;">
                <img src="/images/{{ $product->picture }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $product->title }}</h5>
                  <h5 class="card-title">Price: ${{ $product->price }}</h5>
                  <hr>
                  <p class="card-text">{{ $product->description}} </p>
                  <p class="card-text"><b>Category: {{$product->category->name}}</b></p>
                  @if (Auth::check())
                  <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">View Detail</a>
                  <a href="{{ route('feedbackk.create', $product->id) }}" class="btn btn-primary">Feedback</a>
                  @endif
                </div>
              </div>
            @endforeach
        </div>
    </div>
</div>


@endsection
