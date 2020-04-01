@extends('layouts/main')
@section('content')
    <div class="content">
        <div class="title m-b-md">
            <h1>{{ $post->post_title }}</h1>
        </div>

        <p> Auteurs : {{ $post->author->name }}</p>

        <div>
            {{ $post->post_content }}
        </div>

        <div class="panel-heading">Laissez un commentaire</div>

        <form action="{{"article/".$post->post_name}}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" name="nom" id="nom" placeholder="Votre nom" value="{{ old('nom') }}">
                {!! $errors->first('nom', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" id="email" placeholder="Votre email" value="{{ old('email') }}">
                {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                <textarea class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" name="message" id="message" placeholder="Votre message">{{ old('message') }}</textarea>
                {!! $errors->first('message', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <button type="submit" class="btn btn-secondary"> Envoyer!</button>
        </form>

        <div>
            {{ $post->hasComments->comment_content }}
        </div>

    </div>
@endsection
