@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <br />
    <a href="{{ route('posts.edit', ['id' => $post->id]) }}">Edit Post</a>
    <br/>
    <a href="{{ route('posts.destroy', ['post_id' => $post->id]) }}"
        onclick="event.preventDefault();
                if(confirm('Are you sure?'))document.getElementById('delete-form').submit();">
        {{ __('Delete Post') }}
    </a>

    <form id="delete-form" action="{{ route('posts.destroy', ['post_id' => $post->id]) }}" method="POST" style="display: none;">
        @csrf
        <input type="hidden" name="_method" value="delete">
    </form>
</div>
@endsection
