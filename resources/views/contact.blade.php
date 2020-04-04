@extends('layouts/main')
@section('titre')
    Contacts
@endsection
{{-- Création d'un contact

{!!  !!} : ces acolade remplace <h1>

--}}
@section('custom-styles')
    <style>
        .callout.alert {
            padding: 1rem 2em;
            border-radius: 4px;
        }
        .button.primary {
            border-radius: 4px;
            padding: 1em 4em;
            margin: 0 auto;
            display: block;
            font-weight: 600;
        }
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
        .invalid-feedback{
            color: #dc3545;
        }
        .form-group{
            margin-bottom: 1rem;
            position: relative;
        }
        .form-control{
            margin-bottom: 0;
        }
        .form-group.has-error .form-control{
            border-color: #dc3545;
        }
        .form-group.has-error::after{
            content: "X";
            font-weight: 900;
            position: absolute;
            top: 10px;
            right: 10px;
            display: block;
            color: #dc3545;
            cursor: pointer;
        }

    </style>

@stop
@section('content')
    <br>
    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading">Contactez-nous</div>

          <div class="panel-body">

               {!! Form::open(['url' => 'contact']) !!}

                <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
                    {!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Votre nom']) !!}
                    {!! $errors->first('nom', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Votre email']) !!}
                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group {!! $errors->has('texte') ? 'has-error' : '' !!}">
                    {!! Form::textarea ('texte', null, ['class' => 'form-control', 'placeholder' => 'Votre message']) !!}
                    {!! $errors->first('texte', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                {!! Form::submit('Envoyer', ['class' => 'button primary pull-right']) !!}
                {!! Form::close() !!}
    </div>
</div>
</div>
@endsection
