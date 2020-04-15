@extends('layouts/main')

@section('content')
    <div class="container">
        @if(!empty($user_id))
            @section("title", "Mes articles")
            <h1 class="title text-center">Mes articles</h1>
        @else
            @section("title", "Tous les Articles")
            <h1 class="title text-center">Tous les articles</h1>
        @endif
        <ul>
            @foreach ( $posts as $post )

                <li><a href= "{{"articles/".$post->id}}">{{ $post->post_title }}</a></li>
                <p>{{ $post->post_content }}</p>
            @endforeach
        </ul>
    </div>

@endsection
