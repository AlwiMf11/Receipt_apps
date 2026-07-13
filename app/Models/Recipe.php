<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'thumbnail',
        'ingredients',
        'instructions',
        'cooking_time',
        'difficulty',
        'servings',
        'status',
    ];

    /**
     * Get the category that owns the recipe.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Scope a query to only include published recipes.
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    /**
     * Scope a query to order by latest.
     */
    public function scopeLatestRecipes($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
