<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;
use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RecipeController extends Controller
{
    /**
     * Display a listing of the recipes.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $recipes = Recipe::with('category')
            ->latestRecipes()
            ->paginate(10);

        return view('admin.recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new recipe.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.recipes.create', compact('categories'));
    }

    /**
     * Store a newly created recipe in storage.
     *
     * @param  \App\Http\Requests\StoreRecipeRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRecipeRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('recipes', 'public');
        }

        Recipe::create($data);

        return redirect()
            ->route('admin.recipes.index')
            ->with('success', 'Recipe created successfully.');
    }

    /**
     * Show the form for editing the specified recipe.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\View\View
     */
    public function edit(Recipe $recipe)
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.recipes.edit', compact('recipe', 'categories'));
    }

    /**
     * Update the specified recipe in storage.
     *
     * @param  \App\Http\Requests\UpdateRecipeRequest  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRecipeRequest $request, Recipe $recipe)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('thumbnail')) {
            if ($recipe->thumbnail) {
                Storage::disk('public')->delete($recipe->thumbnail);
            }

            $data['thumbnail'] = $request->file('thumbnail')->store('recipes', 'public');
        }

        $recipe->update($data);

        return redirect()
            ->route('admin.recipes.index')
            ->with('success', 'Recipe updated successfully.');
    }

    /**
     * Remove the specified recipe from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Recipe $recipe)
    {
        if ($recipe->thumbnail) {
            Storage::disk('public')->delete($recipe->thumbnail);
        }

        $recipe->delete();

        return redirect()
            ->route('admin.recipes.index')
            ->with('success', 'Recipe deleted successfully.');
    }
}
