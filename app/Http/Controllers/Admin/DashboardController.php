<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Recipe;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $totalRecipes = Recipe::count();
        $publishedRecipes = Recipe::published()->count();
        $draftRecipes = Recipe::where('status', 'draft')->count();
        $totalCategories = Category::count();

        $recentRecipes = Recipe::with('category')
            ->latestRecipes()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalRecipes',
            'publishedRecipes',
            'draftRecipes',
            'totalCategories',
            'recentRecipes'
        ));
    }
}
