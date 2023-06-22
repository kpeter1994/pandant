<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {   $categories = Category::all();
        $postType = 'feed';
        $posts = Post::where('post_type','feed')->orderBy('id', 'desc')->get();
        return view('pages.posts.index', compact('posts','categories','postType'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Fájl feltöltése
        if ($request->hasFile('image')) {
            $file_path = $request->file('image')->store('public');
            $image_path = str_replace('public/', 'storage/', $file_path);
        } else {
            $image_path = null;
        }

        $post = new Post();
        $post->author = $request->input('author');
        $post->title = $request->input('title');
        $post->content = nl2br($request->input('content'));
        $post->category_id = $request->input('category_id');
        $post->post_type = $request->input('post_type');
        $post->image = $image_path;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'A bejegyzés létrehozása sikeres');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        // return the view and pass in the var we previously created
        return view('pages.posts.edit', compact('post', 'categories')) ;
    }

    public function update(Request $request, $id)
    {
        // Fájl feltöltése
        if ($request->hasFile('image')) {
            $file_path = $request->file('image')->store('public');
            $image_path = str_replace('public/', 'storage/', $file_path);
        } else {
            $image_path = null;
        }

        $post = Post::find($id);
        $post->author = $request->input('author');
        $post->content =  nl2br($request->input('content'));
        $post->category_id = $request->input('category_id');
        $post->post_type = $request->input('post_type');
        $post->image = $image_path;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'A bejegyzés frissítése sikeress');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'A bejegyzés törlése sikeres');
    }
}
