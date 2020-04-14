@extends('layouts/main')
@section('content')
<div class="container">
    <div class="content">
        <div class="title m-b-md">
            <h1>{{ $post->post_title }}</h1>
        </div>

        <p> Auteurs : {{ $post->post_name }}</p>

        <div>
            {{ $post->post_content }}
        </div>
    </div>
    
    <hr>
        <div class="panel-heading"><b>Laissez un commentaire</b></div>

        <div class="panel-body">

               {!! Form::open(['url' => "article/$post->id/comments"]) !!}

               <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
                    {!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Votre nom']) !!}
                    {!! $errors->first('nom', '<div class="text-danger">:message</div>') !!}
                </div>
                <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Votre email']) !!}
                    {!! $errors->first('email', '<div class="text-danger">:message</div>') !!}
                </div>
                <div class="form-group {!! $errors->has('texte') ? 'has-error' : '' !!}">
                    {!! Form::text('texte', null, ['class' => 'form-control', 'placeholder' => 'Votre commentaire']) !!}
                    {!! $errors->first('texte', '<div class="text-danger">:message</div>') !!}
                </div>
                {!! Form::submit('Envoyer', ['class' => 'button primary pull-right']) !!}
                {!! Form::close() !!}
        </div>
    

        <div>
        @foreach ($post->hasComments as $comment)
          <p> <b> {{ $comment->comment_name }} </b> <i>{{ $comment->create_at }}</i> </P>
          <div> {{ $comment->comment_content }}</div>
        @endforeach
        </div>
</div>
@endsection
