@extends('test_admin.master')
@section('title','article Index')
@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Department</th>
                    <th>Phone No.</th>
                </tr>
                @foreach($posts as $post)
                    <tr class = "text-center">
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->firstname }}</td>
                        <td>{{ $post->lastname }}</td>
                        <td>{{ $post->department }}</td>
                        <td>{{ $post->phone }}</td>
                        <td><a href="{{route('test_admin.edit',['id'=>$post->id])}}" class = "btn btn-info">Edit</a></td>
                        <td><a href="{{route('test_admin.destroy',['id'=>$post->id])}}" class = "btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop