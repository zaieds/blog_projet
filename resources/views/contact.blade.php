@extends('layouts/main')
@section('titre')
    Contacts
@endsection
@section('content')
    <br>
    <div class="container">
        <div class="panel panel-info">
            <div class="panel-heading">Contactez-nous</div>

            <div class="panel-body">
                <form>
               {!! Form::open(['url' => 'contact']) !!}

                <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
                    {!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Votre nom']) !!}
                    {!! $errors->first('nom', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Votre email']) !!}
                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group {!! $errors->has('text') ? 'has-error' : '' !!}">
                    {!! Form::textarea ('text', null, ['class' => 'form-control', 'placeholder' => 'Votre message']) !!}
                    {!! $errors->first('text', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                {!! Form::submit('Envoyer', ['class' => 'button primary pull-right']) !!}
                {!! Form::close() !!}
                </form>
            </div>
        </div>
</div>
@endsection
