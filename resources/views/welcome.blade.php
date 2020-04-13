@extends('layouts.main')
@section('content')
    <div class="container">
        <ul>
            @foreach ( $posts as $post )

                <li><a href= "{{"articles/".$post->id}}">{{ $post->post_title }}</a></li>
                <p>{{ $post->post_content }}</p>
            @endforeach
        </ul>
    </div>
@endsection
