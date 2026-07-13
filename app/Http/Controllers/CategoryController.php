<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::withCount('recipes')->get();

        return view('categories.index', compact('categories'));
    }

    /**
     * Display published recipes belonging to the category.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $recipes = $category->recipes()
            ->published()
            ->latestRecipes()
            ->paginate(9);

        return view('categories.show', compact('category', 'recipes'));
    }
}
