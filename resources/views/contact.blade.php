@extends('layouts/main')
@section('titre')
    Contacts
@endsection
@section('content')
    <br>
    <div class="container">
        <div class="panel panel-info">
            <div class="h2 text-center">Contactez-nous</div>

            <div class="panel-body">
               {!! Form::open(['url' => 'contact']) !!}

                <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
                    {!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Votre nom']) !!}
                    {!! $errors->first('nom', '<div class="text-danger">:message</div>') !!}
                </div>
                <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Votre email']) !!}
                    {!! $errors->first('email', '<div class="text-danger">:message</div>') !!}
                </div>
                <div class="form-group {!! $errors->has('text') ? 'has-error' : '' !!}">
                    {!! Form::textarea ('text', null, ['class' => 'form-control', 'placeholder' => 'Votre message']) !!}
                    {!! $errors->first('text', '<div class="text-danger">:message</div>') !!}
                </div>
                {!! Form::submit('Envoyer', ['class' => 'button primary pull-right']) !!}
                {!! Form::close() !!}
            </div>
        </div>
</div>
@endsection
