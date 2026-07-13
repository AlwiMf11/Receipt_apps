<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;

class HomeController extends Controller
{
    /**
     * Display the homepage.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $featuredRecipes = Recipe::published()
            ->latestRecipes()
            ->take(6)
            ->get();

        $latestRecipes = Recipe::published()
            ->latestRecipes()
            ->take(8)
            ->get();

        $categories = Category::withCount('recipes')->get();

        return view('home', compact('featuredRecipes', 'latestRecipes', 'categories'));
    }
}
