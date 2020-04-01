@extends('layouts/main')
@section('content')
    <div>
        <ul>
            @foreach ( $posts as $post )

                <li><a href= "{{"article/".$post->post_name}}">{{ $post->post_title }}</a></li>
                <p>{{ $post->post_content }}</p>
            @endforeach
        </ul>
    </div>
@endsection
