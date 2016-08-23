<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'description', 'image', 'name', 'preparationTime', 'score'
  ];

  public function ingredients() {
    return $this->belongsToMany('App\Ingredient', 'recipes_ingredients')->orderBy('name', 'asc');
  }

  public function tags() {
    return $this->belongsToMany('App\Tag', 'recipes_tags')->orderBy('name', 'asc');
  }

  public function ratingsRecipes() {
    return $this->hasMany('App\RatingsRecipe')->orderBy('name', 'asc');
  }

  public function recipeIngredients() {
    return $this->hasMany('App\RecipeIngredient')->orderBy('name', 'asc');
  }

  public function scopeSearch($query, $search) {
    return $query->where('name', 'like', '%' . $search . '%');
  }
}
