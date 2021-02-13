<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Post;
use App\Categorie;
use App\PostInformation;
use App\Tag;
use App\User;

class BoolpressController extends Controller
{
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
        $posts = Post::all();
        $user = Auth::user();
        return view('posts.index', compact('posts','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        $tags = Tag::all();
        return view('posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    {
        $data = $request->all();

        $newPost = new Post();
        $newPost->title = $data['inputPostTitle'];
        $newPost->author = $data['inputPostAuthor'];
        $newPost->category_id = $data['inputPostCategory'];
        $newPost->save();

        $newPostInfo = new PostInformation();
        $newPostInfo->description = $data['inputPostInfo'];
        $newPostInfo->post_id = $newPost->id;
        $newPostInfo->slug = Str::slug($newPost->title, '-');
        $newPostInfo->save();

        $newPost->tags()->attach($data['inputPostTags']);

        $post = $newPost;
        return view('posts.show', compact('post'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Categorie::all();
        $tags = Tag::all();
        return view('posts.edit', compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();

        $post->update([
                'title' => $data['inputTitle'],
                'author' => $data['inputAuthor'],
                'category_id' => $data['inputPostCategory']
        ]);

        $post->postInfo()->update([ 'description' => $data['inputInfo'] ]);
        $post->tags()->sync($data['selectTags']);

        return redirect()->route('posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->postInfo()->delete();
        $post->tags()->detach();
        $post->delete();

        return redirect()->route('posts.index');
    }
}
