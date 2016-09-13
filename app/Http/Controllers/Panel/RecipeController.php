<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Panel\RecipeRequest;
use App\Http\Controllers\Controller;

use App\Recipe;
use App\Tag;
use App\Ingredient;
use App\Unit;
use App\RecipeIngredient;
use DB;
use Image;
use Illuminate\Support\Facades\Input;

class RecipeController extends Controller
{
  public function index()
  {
    $recipes = Recipe::orderBy('name', 'asc')->paginate(20);

    return view('panel.recipes.index', compact('recipes'));
  }

  public function show($id)
  {
    $recipe = Recipe::findOrFail($id);
    $recipeIngredients = RecipeIngredient::where('recipe_id', $recipe->id)->get();

    return view('panel.recipes.show', compact('recipe','recipeIngredients'));
  }

  public function create()
  {
    $tags = Tag::orderBy('name', 'asc')->get();
    $ingredients = Ingredient::orderBy('name', 'asc')->get();
    $units = Unit::orderBy('singular_name', 'asc')->get();

    return view('panel.recipes.create', compact('tags', 'ingredients', 'units'));
  }

  public function store(RecipeRequest $request)
  {
    $recipe = Recipe::create($request->except('image'));

    saveRecipeTags($request->tags, $recipe->id);
    saveRecipeIngredients($request, $recipe->id);

    if($request->hasFile('image')) {
      saveImage('recipe', $recipe->id);
    }

    return redirect()->route('panel.recipes.show', $recipe->id);
  }

  public function edit($id)
  {
    $tags = [];
    $ingredients = [];
    $recipe = Recipe::findOrFail($id);
    $allTags = Tag::orderBy('name', 'asc')->get();
    $allIngredients = Ingredient::orderBy('name', 'asc')->get();
    $units = Unit::orderBy('singular_name', 'asc')->get();
    $recipeIngredients = RecipeIngredient::where('recipe_id', $recipe->id)->get();

    $i = 0;
    foreach($recipe->tags as $tag){
      $tags[$i] = $tag->id;
      $i++;
    }
    $i = 0;
    foreach($recipe->ingredients as $ingredient){
      $ingredients[$i] = $ingredient->id;
      $i++;
    }
    return view('panel.recipes.edit', compact('recipe','allTags','tags','allIngredients','ingredients','units','recipeIngredients'));
  }

  public function update(RecipeRequest $request, $id)
  {
    $recipe = Recipe::findOrFail($id);

    $recipe->update($request->except('image'));

    deleteRecipeTags($recipe->id);
    deleteRecipeIngredients($recipe->id);

    saveRecipeTags($request->tags, $recipe->id);
    saveRecipeIngredients($request, $recipe->id);

    if($request->hasFile('image')) {
      saveImage('recipe', $id);
    }

    return redirect()->route('panel.recipes.show', $id);
  }

  public function destroy(Request $request, $id)
  {

    if (!($request->cookie(env("PRIVATE_ACCESS_COOKIE_NAME")) == env("PRIVATE_ACCESS_COOKIE_ADMIN_VALUE"))) {
		  $url = '/panel/prohibitedaction/'.str_replace("/", "%20", $request->url());
		  return redirect($url);
    }

    $recipe = Recipe::findOrFail($id);
    $recipe->delete();

    return redirect()->route('panel.recipes.index');
  }
}