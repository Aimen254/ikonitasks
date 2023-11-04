@extends('admin.layouts.app')

@section('content')

<h1 class="text-center">Admin All Feedback Category</h1>
<br>


<div class="container">
    <div class="row">
        <div class="col-md-12" style="display:flex">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $category->id }}</th>
                                <td>{{ $category->name }}</td>
                                <td><a href="{{ route('feebackcategory.edit', $category->id)}}" class="btn btn-primary">Edit</a></td>
                                <td><a href="{{ route('feebackcategory.create')}}" class="btn btn-info">Create</a></td>
                                <td>
                                    <form action="{{ route('feebackcategory.destroy', $category->id)}}" method="POST">
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
