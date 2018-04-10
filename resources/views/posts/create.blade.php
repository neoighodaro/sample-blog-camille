@extends('layouts.app')

@section('content')

<div class="container">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>Create Post</h1>
    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Post Title</label>
            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="content">Post Content</label>
            <textarea name="content" class="form-control" id="content" cols="30" rows="10">{{ old('content') }}</textarea>
        </div>
        <div class="form-group">
            <label for="type_id">Post Type</label>
            <select name="type_id" class="form-control" id="type_id">
                <option>Select Post Type</option>
                @foreach ($post_types as $post_type)
                <option value="{{ $post_type->id }}" {{ old('type_id') == $post_type->id ? "SELECTED" : null }} >{{ $post_type->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="genre_id">Post Genre</label>
            <select name="genre_id" class="form-control" id="genre_id">
                <option>Select Genre</option>
                @foreach ($post_genres as $post_genre)
                <option value="{{ $post_genre->id }}" {{ old('genre_id') == $post_genre->id ? "SELECTED" : null }} >{{ $post_genre->name }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Submit Post" class="btn btn-lg btn-primary">
    </form>
</div>
@endsection
