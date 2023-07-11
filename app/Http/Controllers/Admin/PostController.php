<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.posts.create',  compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validazione
        $request->validate(
            [
                'title'         => 'required|string|min:5|max:100',
                'type_id'       => 'required|integer|exists:types,id',
                'url_image'     => 'required|url|max:200',
                'content'       => 'required|string',
            ],
            // custom error message
            // [
            //     'title.required'    => 'Title required!',
            //     'title.min'         => 'Title needs minimum 5 letter!',
            // ]
        );

        // prendo i dati dalla create page
        $data = $request->all();

        // salvare i dati in db se validi
        $newPost = new Post();
        $newPost->title         = $data['title'];
        $newPost->type_id       = $data['type_id'];
        $newPost->content       = $data['content'];
        $newPost->url_image     = $data['url_image'];
        $newPost->save();

        // returnare in una rotta di tipo get
        return to_route('admin.posts.show', ['post' => $newPost]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $types = Type::all();
        return view('admin.posts.edit', compact('post', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // validare i dati del form
        $request->validate(
            [
                'title'         => 'required|string|min:5|max:100',
                'type_id'       => 'required|integer|exists:types,id',
                'content'       => 'required|string',
                'url_image'     => 'required|url|max:200',
            ],
            // custom error message
            // [
            //     'title.required'    => 'Title required!',
            //     'title.min'         => 'Title needs minimum 5 letter!',
            // ]
        );

        $data = $request->all();

        // aggiornare i dati nel db se validi
        $post->title        = $data['title'];
        $post->type_id      = $data['type_id'];
        $post->url_image    = $data['url_image'];
        $post->content      = $data['content'];
        $post->update();

        // ridirezionare su una rotta di tipo get
        return to_route('admin.posts.show', ['post' => $post]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete(); // se settiamo in model e in migrate il softdelete, cambia in automatico
        return to_route('admin.posts.index')->with('softdelete_success', $post);
    }

    public function restore($id)
    {
        Post::withTrashed()
            ->where('id', $id)
            ->restore();

        $post = Post::find($id);

        return to_route('admin.posts.index')->with('restore_success', $post);
    }

    public function trashed()
    {
        $trashedPosts = Post::onlyTrashed()->paginate(5); // SELECT * FROM 'posts'

        return view('admin.posts.trashed', compact('trashedPosts'));
        // OR
        // return view('posts.trashed', [
        //     'posts' => $trashedPosts,
        // ]);
    }

    public function harddelete($id)
    {
        $post = Post::withTrashed()->find($id);
        $post->forceDelete();

        return to_route('admin.posts.index')->with('harddelete_success', $post);
    }
}
