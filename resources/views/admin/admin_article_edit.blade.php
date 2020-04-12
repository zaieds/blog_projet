@extends('layouts.main')
@section('title','Edit article')
@section('content')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.15.0/css/mdb.min.css" rel="stylesheet">


    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.9/js/mdb.min.js"></script>
    <div class="row mt-5">
        <div class="col-sm-8 offset-sm-2">
            <form action="{{route('article')}}" method = "post">
                @csrf
                <div class="form-group">
                    <label for="post_title">le nom de l'article:</label>
                    <input type="text" name = "post_title" id = "post_title" class="form-control" required value = "">
        </div>
                <div class="form-group">
                    <label for="post_name">nom de l'auteur:</label>
                    <input type="text" name = "post_name" id = "post_name" class="form-control" required value = "">
                </div>
                <div class="form-group">
                    <label for="post_content">contenue de l'article:</label>
                    <input type="text" name = "post_content" id = "post_content" class="form-control" required value = "">
                </div>
                <input type="hidden" name="id" value = "">
                <button type = "submit" class = "btn btn-success">confirmer</button>
            </form>
        </div>
    </div>
@stop
