@extends('layouts.main')
@extends('post_single')
@extends('article')
@section('title','admin Index')
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
    <style>
        .container {
            padding: 0.5%;
        }
    </style>
    <div class="container">
    <div class="row">
        <a href="" class = "btn btn-info" style="margin: auto" data-toggle="modal" data-target="#exampleModal">Ajouter un article</a>
        <div class="col-md-12">
            <table class="table table-bordered">

                <tr>
                    <th>#</th>
                    <th>Nom de l'article</th>
                    <th>Nom de l'auteur</th>
                    <th>Contenue de l'article</th>
                    <th>Catégorie</th>
                    <th>id utilisateur</th>

                </tr>
               @foreach($posts as $post)
                    <tr class = "text-center">
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->post_title }}</td>
                        <td>{{ $post->post_name }}</td>
                        <td>{{ $post->post_content }}</td>
                        <td>{{ $post->post_category }}</td>
                        <td>{{ $post->user_id }}</td>
                        <td><a class = "btn btn-info">Changer</a></td>
                        <td><a  class = "btn btn-danger">Supprimer</a></td>

{{-- <td><a href="{{route('admin_edit',['id'=>$post->id])}}" class = "btn btn-info">Changer</a></td>
 <td><a href="{{route('admin_destroy',['id'=>$post->id])}}" class = "btn btn-danger">Supprimer</a></td>
--}}
                    </tr>
                @endforeach

            </table>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajouter un article</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="panel-body">

                                <form action="{{route('store_article')}}" method="post">
                                    {!! Form::token() !!}
                                    <div class="form-group {!! $errors->has('nomArt') ? 'has-error' : '' !!}">
                                        {!! Form::text('nomArt', null, ['class' => 'form-control', 'placeholder' => 'Titre de l\'article']) !!}
                                        {!! $errors->first('nomArt', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group {!! $errors->has('nomAut') ? 'has-error' : '' !!}">
                                        {!! Form::text('nomAut', null, ['class' => 'form-control', 'placeholder' => 'Nom de l\'auteur']) !!}
                                        {!! $errors->first('nomAut', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group {!! $errors->has('contenus') ? 'has-error' : '' !!}">
                                        {!! Form::textarea ('contenus', null, ['class' => 'form-control', 'placeholder' => 'Contenue de l\'article']) !!}
                                        {!! $errors->first('contenus', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group {!! $errors->has('user_id') ? 'has-error' : '' !!}">
                                        {!! Form::text('user_id', null, ['class' => 'form-control', 'placeholder' => 'id de l\'utilisateur']) !!}
                                        {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                    <div class="form-group {!! $errors->has('post_category') ? 'has-error' : '' !!}">
                                        {!! Form::text('post_category', null, ['class' => 'form-control', 'placeholder' => 'category de l\'article']) !!}
                                        {!! $errors->first('post_category', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                    <div class="form-group {!! $errors->has('post_status') ? 'has-error' : '' !!}">
                                        {!! Form::checkbox('post_status', null, ['class' => 'form-control', 'placeholder' => 'Publier l\'article']) !!}
                                        {!! Form::label('post_status', 'Publier l\'article') !!}
                                        {!! $errors->first('post_status', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Enregistrer">
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@stop
