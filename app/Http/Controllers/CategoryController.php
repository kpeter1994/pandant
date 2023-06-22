<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all(); // Az összes kategória lekérése az adatbázisból
        return view('pages.category.index', compact('categories')); // A kategóriák listájának megjelenítése
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.category.create'); // Új kategória létrehozása űrlap megjelenítése
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

        $category = new Category(); // Új kategória modell létrehozása
        $category->category_name = $request->input('category_name'); // Az űrlapon megadott kategória nevének beállítása
        $category->master_category = $request->input('master_category'); // Az űrlapon megadott kategória nevének beállítása
        $category->description = $request->input('description'); // Az űrlapon megadott kategória nevének beállítása
        $category->image = $image_path;
        $category->save(); // Az új kategória mentése az adatbázisba
        return redirect()->route('category.index')->with('success', 'Kategória sikeresen létrehozva.'); // A kategóriák listájának megjelenítése a sikerüzenettel
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::where('category_id',$id)->get();
        $category = Category::find($id);
        return view('pages.category.show', compact('category','posts')); // Új kategória létrehozása űrlap megjelenítése
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('pages.category.edit', compact('category')); // Új kategória létrehozása űrlap megjelenítése
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

        $category = Category::find($id);

        if ($request->hasFile('image')) {
            $file_path = $request->file('image')->store('public');
            $image_path = str_replace('public/', 'storage/', $file_path);
        } else {
            $image_path = $category->image;
        }


        $category->category_name = $request->input('category_name'); // Az űrlapon megadott kategória nevének beállítása
        $category->master_category = $request->input('master_category'); // Az űrlapon megadott kategória nevének beállítása
        $category->description = $request->input('description'); // Az űrlapon megadott kategória nevének beállítása
        $category->image = $image_path;
        $category->save(); // Az új kategória mentése az adatbázisba
        return redirect()->route('category.index')->with('success', 'Partner sikeresen frissült.'); // A kategóriák listájának megjelenítése a sikerüzenettel
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Partner sikeresen tötölve lett.'); // A kategóriák listájának megjelenítése a sikerüzenettel
    }
}
