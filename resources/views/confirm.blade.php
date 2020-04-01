@extends('layouts/main')
@section('titre')
    Contacts
@endsection

@section('custom-styles')
    <style>
        .confirm-container{
            border: 1px solid rgba(0,0,0,.1);
            padding: 1em;
            background-color: #e1faea;
            box-shadow: 0px 0px 5px rgba(0,0,0,.2);
        }
        .panel-heading
        {
            font-weight: 600;
            text-align: center;
            margin-bottom: 1em;
        }
    </style>

@stop
@section('content')
    <br>
    <div class="col-sm-offset-3 col-sm-6 confirm-container">
        <div class="panel panel-info">
            <div class="panel-heading">Contactez-moi</div>
            <div class="panel-body">
                Merci <span class="user_name" style="font-weight: 600;">{{$nom}}</span>. Votre message a été transmis. Vous recevrez une réponse rapidement.
            </div>
        </div>
    </div>
@stop