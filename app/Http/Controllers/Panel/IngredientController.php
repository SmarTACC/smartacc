<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Panel\IngredientRequest;
use App\Http\Controllers\Controller;

use App\Recipe;
use App\Tag;
use App\Ingredient;

class IngredientController extends Controller
{
  public function index()
  {
    $ingredients = Ingredient::orderBy('name', 'asc')->paginate(20);

    return view('panel.ingredients.index', compact('ingredients'));
  }

  public function show($id)
  {
    $ingredient = Ingredient::findOrFail($id);

    return view('panel.ingredients.show', compact('ingredient'));
  }

  public function create()
  {
    return view('panel.ingredients.create');
  }

  public function store(IngredientRequest $request)
  {
    $ingredient = Ingredient::create($request->all());

    return redirect()->route('panel.ingredients.show', $ingredient->id);
  }

  public function edit($id)
  {
    $ingredient = Ingredient::findOrFail($id);

    return view('panel.ingredients.edit', compact('ingredient'));
  }

  public function update(IngredientRequest $request, $id)
  {
    $ingredient = Ingredient::findOrFail($id);
		$ingredient->update($request->all());

    return redirect()->route('panel.ingredients.show', $id);
  }

  public function destroy($id)
  {

    if (!($request->cookie(env("PRIVATE_ACCESS_COOKIE_NAME")) == env("PRIVATE_ACCESS_COOKIE_ADMIN_VALUE"))) {
		  $url = '/panel/prohibitedaction/'.str_replace("/", "%20", $request->url());
		  return redirect($url);
    }

		$ingredient = Ingredient::findOrFail($id);
		$ingredient->delete();

		return redirect()->route('panel.ingredients.index');
	}
}
