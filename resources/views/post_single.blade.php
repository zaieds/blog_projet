@extends('layouts/main')
@section('custom-styles')
    <style>
        .article{
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
        }
        .panel-body{
            flex: 1;
            padding-left: 1em;
        }
        .content{
            flex: 1;
            padding-right: 1em;
        }
        .panel-heading{
            font-size: 16px;
            display: block;
            margin-bottom: 1em;
            font-weight: 700;
        }
        .fill-width{
            width: 100%;
        }

        .content .content_description{
            background-color: #f6f6f6;
            border: 1px solid rgba(241, 215, 215, 0.3);
            padding: 1em;
        }
    </style>
@stop
@section('content')
<div class="container">


    <div class="article">
        <div class="fill-width">
            <h2 class="text-center title">{{ $post->post_title }}</h2>
        </div>
        <div class="content">
            <p> <b>Auteurs :</b> {{ $post->post_name }}</p>

            <div class="content_description">
                {{ $post->post_content }}
            </div>
        </div>

        <div class="panel-body">
            <div class="panel-heading"><b>Laissez un commentaire</b></div>
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
                {!! Form::textarea('texte', null, ['class' => 'form-control', 'placeholder' => 'Votre commentaire']) !!}
                {!! $errors->first('texte', '<div class="text-danger">:message</div>') !!}
            </div>
            {!! Form::submit('Envoyer', ['class' => 'button primary pull-right']) !!}
            {!! Form::close() !!}

        </div>

        <div class="article__comments fill-width">
            <hr>
            <h3 class="title text-center">Les commentaires</h3>
            @foreach ($post->hasComments as $comment)
                <p> <b> {{ $comment->comment_name }} </b> <i>{{ $comment->create_at }}</i> </P>
                <div> {{ $comment->comment_content }}</div>
            @endforeach
        </div>
    </div>
</div>
@endsection
