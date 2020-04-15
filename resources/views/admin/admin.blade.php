@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if( Auth::check() && mb_strtolower(Auth::user()->role) == "admin")
                <a class="btn btn-secondary" href="{{route('index_article')}}">Gerer les articles</a>
                <a class="btn btn-secondary" href="admin/contact">Gerer les demandes de contact</a>
                    <a class="btn btn-secondary" href="{{route('index_user')}}">Gerer les utilisateur</a>
                @else
                    <a class="btn btn-secondary" href="{{route('user_admin_articles', ['user_id'=> Auth::user()->id])}}">Gerer mes articles</a>
                    <a class="btn btn-secondary" href="{{route("user_admin_comments", ['user_id'=> Auth::user()->id])}}">Gerer les commentaires</a>
                @endif
            </div>
        </div>
    </div>
@stop
