@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-secondary" href="{{route('index_article')}}">Gerer les articles</a>
                <a class="btn btn-secondary" href="admin/contact">Gerer les demandes de contact</a>
            </div>
        </div>
    </div>

@stop
