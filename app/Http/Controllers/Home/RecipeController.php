<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Place;
use App\Ingredient;
use App\RecipeIngredient;
use App\Tag;
use App\Recipe;
use App\Category;
use App\RatingsRecipe;
use App\RatingsPlace;
use Auth;
use App\Http\Controllers\Controller;

class RecipeController extends Controller
{
  public function index() {
    $recipes = Recipe::orderBy('name', 'asc')->get();
    $type = 'list';

    return view('home.recipes', compact('recipes','type'));
  }

  public function show($id, $type) {
    $recipe = Recipe::findOrFail($id);
    $tags = $recipe->tags;
    $ingredients = RecipeIngredient::where('recipe_id', $recipe->id)->get();
    $user = Auth::user();
    if($user)
  			$rating = RatingsRecipe::where('recipe_id', $recipe->id)->where('user_id', $user->id)->first();
  		else
      $rating = 0;

    return view('home.recipe', compact('recipe', 'tags', 'ingredients', 'type', 'rating'));
  }

  public function rate($id, $type, $rating) {
    $user = Auth::user();
    if($user){
      $ratingsRecipe = RatingsRecipe::firstOrCreate(['user_id' => $user->id, 'recipe_id' => $id]);
      $ratingsRecipe->rating = $rating;
      $ratingsRecipe->save();
      return redirect()->route('home.recipes.show', [$id, $type])->with('message', 'La receta fue puntuada correctamente');
    }

    return redirect()->route('home.recipes.show', [$id, $type])->with('message', 'Tenés que tener una cuenta para puntuar');
  }

  public function search() {
    $tags = Tag::orderBy('name', 'asc')->get();
    $ingredients = Ingredient::orderBy('name', 'asc')->get();

    return view('home.search', compact('tags','ingredients'));
  }

  public function postSearch(Request $request) {
    $recipes = Recipe::search($request->name)->get();
    $selectedTags = explode(' ', $request->tagsArray);
    $selectedIngredients = explode(' ', $request->ingredientsArray);

    if($selectedIngredients[0] == ""){
      $selectedIngredients = [];
    }
    if($selectedTags[0] == "") {
      $selectedTags = [];
    }

    $recipeNumber = 0;

    foreach ($recipes as $recipe) {
      $tagNumber = 0;
      $ingredientNumber = 0;
      $recipeTags = [];
      $recipeIngredients = [];
      foreach ($recipe->tags as $tag) {
        array_push($recipeTags, $tag->id);
      }

      foreach ($recipe->ingredients as $ingredient) {
        array_push($recipeIngredients, $ingredient->id);
      }

      while ($tagNumber < count($selectedTags) && in_array($selectedTags[$tagNumber], $recipeTags)) {
        $tagNumber++;
      }

      if ($tagNumber != count($selectedTags) && count($selectedTags) != 0) {
        unset($recipes[$recipeNumber]);
      }
      else {
        while ($ingredientNumber < count($selectedIngredients) && in_array($selectedIngredients[$ingredientNumber], $recipeIngredients)) {
          $ingredientNumber++;
        }
        if ($ingredientNumber != count($selectedIngredients) && count($selectedIngredients) != 0) {
          unset($recipes[$recipeNumber]);
        }
      }
      $recipeNumber++;
    }
    $type = 'search-list';

    return view('home.recipes', compact('recipes','type'));
  }

}
