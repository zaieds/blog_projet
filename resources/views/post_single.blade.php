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

        <div class="panel-body">

               {!! Form::open(['url' => "article/$post->id/comments"]) !!}

               <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
                    {!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Votre nom']) !!}
                    {!! $errors->first('nom', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Votre email']) !!}
                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group {!! $errors->has('texte') ? 'has-error' : '' !!}">
                    {!! Form::textarea ('texte', null, ['class' => 'form-control', 'placeholder' => 'Votre commentaire']) !!}
                    {!! $errors->first('texte', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                {!! Form::submit('Envoyer', ['class' => 'button primary pull-right']) !!}
                {!! Form::close() !!}
        </div>

        
        @foreach ($post->hasComments as $comment)
          <p> <b> {{ $comment->comment_name }} </b> <i>{{ $comment->comment_date }}</i> </P>
          <div> {{ $comment->comment_content }}</div>
        @endforeach

    </div>
@endsection
