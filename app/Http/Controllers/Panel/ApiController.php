<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Recipe;
use App\Ingredient;
use App\Tag;
use App\Unit;
use App\Place;
use App\Category;
use DB;
use Carbon\Carbon;

class ApiController extends Controller
{
  public function recipes($date = null)
  {
    if ($date == null) {
      return Recipe::orderBy('name', 'asc')->get();
    }
    else {
      $date = Carbon::now();
      return Recipe::whereDate('created_at', '>=', $date)->orWhereDate('updated_at', '>=', $date)->orWhereDate('deleted_at', '>=', $date)->orderBy('name', 'asc')->get();
    }
  }

  public function ingredients($date = null)
  {
    if ($date == null) {
      return Ingredient::orderBy('name', 'asc')->get();
    }
    else {
      $date = Carbon::parse($date);
      return Ingredient::whereDate('created_at', '>=', $date)->orWhereDate('updated_at', '>=', $date)->orWhereDate('deleted_at', '>=', $date)->orderBy('name', 'asc')->get();
    }
  }

  public function tags($date = null)
  {
    if ($date == null) {
      return Tag::orderBy('name', 'asc')->get();
    }
    else {
      $date = Carbon::parse($date);
      return Tag::whereDate('created_at', '>=', $date)->orWhereDate('updated_at', '>=', $date)->orWhereDate('deleted_at', '>=', $date)->orderBy('name', 'asc')->get();
    }
  }

  public function recipesIngredients($date = null)
  {
    if ($date == null) {
      return DB::table('recipes_ingredients')->get();
    }
    else {
      $date = Carbon::parse($date);
      return DB::table('recipes_ingredients')->whereDate('created_at', '>=', $date)->orWhereDate('updated_at', '>=', $date)->orWhereDate('deleted_at', '>=', $date)->get();
    }
  }

  public function recipesTags($date = null)
  {
    if ($date == null) {
      return DB::table('recipes_tags')->get();
    }
    else {
      $date = Carbon::parse($date);
      return DB::table('recipes_tags')->whereDate('created_at', '>=', $date)->orWhereDate('updated_at', '>=', $date)->orWhereDate('deleted_at', '>=', $date)->get();
    }
  }

  public function units($date = null)
  {
    if ($date == null) {
      return Unit::orderBy('singular_name', 'asc')->get();
    }
    else {
      $date = Carbon::parse($date);
      return Unit::whereDate('created_at', '>=', $date)->orWhereDate('updated_at', '>=', $date)->orWhereDate('deleted_at', '>=', $date)->orderBy('singular_name', 'asc')->get();
    }
  }

  public function places($date = null)
  {
    if ($date == null) {
      return Place::orderBy('name', 'asc')->get();
    }
    else {
      $date = Carbon::parse($date);
      return Place::whereDate('created_at', '>=', $date)->orWhereDate('updated_at', '>=', $date)->orWhereDate('deleted_at', '>=', $date)->orderBy('name', 'asc')->get();
    }
  }

  public function categories($date = null)
  {
    if ($date == null) {
      return Category::orderBy('name', 'asc')->get();
    }
    else {
      $date = Carbon::parse($date);
      return Category::whereDate('created_at', '>=', $date)->orWhereDate('updated_at', '>=', $date)->orWhereDate('deleted_at', '>=', $date)->orderBy('name', 'asc')->get();
    }
  }
}
