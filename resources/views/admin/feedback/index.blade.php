@extends('admin.layouts.app')

@section('content')

<h1 class="text-center">Admin All Table Feedbacks</h1>
<br>


<div class="container">
    <div class="row">
        <div class="col-md-12" style="display:flex">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">category</th>
                        <th scope="col">Description</th>
                        <th scope="col">Product</th>
                        <th scope="col">User</th>
                        <th scope="col">Vote Count</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($feedbacks as $feedback)
                            <tr>
                                <th scope="row">{{ $feedback->id }}</th>
                                <td>{{ $feedback->title }}</td>
                                <td>{{$feedback->category->name}}</td>
                                <td>{{ $feedback->discription }}</td>
                                <td>{{$feedback->product->title}}</td>
                                <td>{{$feedback->users->name}}</td>
                                <td>{{$feedback->vote}}</td>
                                <td><a href="{{ route('feedback.edit', $feedback->id)}}" class="btn btn-primary">Edit</a></td>
                                <td><a href="{{ route('feedbackk.create',$feedback->product_id)}}" class="btn btn-info">Create</a></td>
                                <td>
                                    <form action="{{ route('feedbackk.delete', $feedback->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>


@endsection
