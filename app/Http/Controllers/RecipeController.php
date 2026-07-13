<?php

namespace App\Http\Controllers;

use App\Models\Recipe;

class RecipeController extends Controller
{
    /**
     * Display a listing of published recipes.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $recipes = Recipe::published()
            ->latestRecipes()
            ->with('category')
            ->paginate(9);

        return view('recipes.index', compact('recipes'));
    }

    /**
     * Display the specified recipe.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $recipe = Recipe::published()
            ->with('category')
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedRecipes = Recipe::published()
            ->where('category_id', $recipe->category_id)
            ->where('id', '!=', $recipe->id)
            ->take(4)
            ->get();

        return view('recipes.show', compact('recipe', 'relatedRecipes'));
    }
}
