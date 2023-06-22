<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class EduController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postType = 'edu';
        $categories = Category::all();
        return view('pages.education.index', compact('postType','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    $postType = 'edu';
        $categories = Category::all();
        return view('pages.education.create',compact('postType', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        $post->content = htmlentities($request->input('content'));
        $post->category = $request->input('category');
        $post->image = $image_path;
        $post->save();

        return redirect()->route('edu.index')->with('success', 'A bejegyzés létrehozása sikeres');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('pages.education.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
