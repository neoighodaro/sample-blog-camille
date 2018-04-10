@extends('layouts.app')

@section('content')
<div class="container">
    <ul>
        @foreach ($posts as $post)
        <li>
            <h2><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a></h2>
            <p>{{ $post->content }}</p>
        </li>
        @endforeach
    </ul>
</div>

@endsection
