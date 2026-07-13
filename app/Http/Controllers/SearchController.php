<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Search published recipes by title.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->query('q');

        $recipes = Recipe::published()
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('title', 'like', '%' . $keyword . '%');
            })
            ->with('category')
            ->latestRecipes()
            ->paginate(9)
            ->appends(['q' => $keyword]);

        return view('recipes.search', compact('recipes', 'keyword'));
    }
}
