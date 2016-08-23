<?php

use Illuminate\Support\Facades\Input;
use App\Ingredient;
use App\Unit;
use App\Tag;

function saveImage($type, $id)
{
  if ($type == 'recipe') {
    $size = 750;
    $location = 'img/recipes/';
  }
  else if ($type == 'category') {
    $size = 64;
    $location = 'img/categories/';
  }
	$image = Image::make(Input::file('image'));
  $image->resize($size, null, function ($constraint) {
	  $constraint->aspectRatio();
	});
	$image->save($location . $id . '.jpg');
	if ($type == 'recipe') {
  	$image->fit(75);
  	$image->save($location . $id . '_square.jpg');
	}
}

function deleteRecipeTags($recipe_id)
{
  DB::table('recipes_tags')->where('recipe_id', $recipe_id)->delete();
}

function deleteRecipeIngredients($recipe_id)
{
  DB::table('recipes_ingredients')->where('recipe_id', $recipe_id)->delete();
}

function saveRecipeTags($tags, $recipe_id)
{
  if ($tags) {
    foreach ($tags as $tag) {
      if (is_numeric($tag)) {
        $tag_id = $tag;
      }
      else {
        $tag_name = $tag;
        $tag = new Tag();
        $tag->name = $tag_name;
        $tag->save();
        $tag_id = $tag->id;
      }
      DB::table('recipes_tags')->insert([
        'recipe_id' => $recipe_id,
        'tag_id' => $tag_id
      ]);
    }
  }
}

function saveRecipeIngredients($request, $recipe_id)
{
  for ($i = 0; $i <= $request->total_values; $i++) {
    if ($request->input('values_' . $i)) {
      echo $request->input('values_' . $i);
      $values = explode('-|-', $request->input('values_' . $i));

      $amount = $values[0];
      $ingredient = $values[1];
      $unit = $values[2];

      if (is_numeric($ingredient)) {
        $ingredient_id = $ingredient;
      }
      else {
        $ingredient_name = $ingredient;
        $ingredient = new Ingredient();
        $ingredient->name = $ingredient_name;
        $ingredient->save();
        $ingredient_id = $ingredient->id;
      }

      if (is_numeric($unit)) {
        $unit_id = $unit;
      }
      else {
        $unit_name = $unit;
        $unit = new Unit();
        if ($amount == '1') {
          $unit->singular_name = $unit_name;
        }
        else {
          $unit->plural_name = $unit_name;
        }
        $unit->save();
        $unit_id = $unit->id;
      }

      DB::table('recipes_ingredients')->insert([
        'recipe_id' => $recipe_id,
        'ingredient_id' => $ingredient_id,
        'unit_id' => $unit_id,
        'amount' => $amount
      ]);
    }
  }
}