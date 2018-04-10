<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\PostType;
use App\PostGenre;

class PostController extends Controller
{
    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(20);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post_types = PostType::all();
        $post_genres = PostGenre::all();

        return view('posts.create', compact('post_types', 'post_genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|between:1,50',
            'content' => 'required|between:10,5000',
            'type_id' => 'required|exists:post_types,id',
            'genre_id' => 'required|exists:post_genres,id'
        ]);

        $post = Post::create($data + ['user_id' => auth()->user()->id]);

        return redirect()->route('posts.index')->withMessage('Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  integer  $id post id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  integer  $id post id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $post = Post::findOrFail($id);
        $post_types = PostType::all();
        $post_genres = PostGenre::all();

        return view('posts.edit', compact('post', 'post_types', 'post_genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer  $id post id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $post = Post::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|between:1,50',
            'content' => 'required|between:10,5000',
            'type_id' => 'required|exists:post_types,id',
            'genre_id' => 'required|exists:post_genres,id'
        ]);

        $post->update($data);

        return redirect()->route('posts.show', ['post_id' => $post->id])->withMessage('Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Post::findOrFail($id)->delete();

        return redirect()->route('posts.index')->withMessage('Post deleted successfully.');
    }
}
