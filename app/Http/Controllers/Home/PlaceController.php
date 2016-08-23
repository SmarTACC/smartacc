<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Place;
use App\Category;
use App\RatingsPlace;
use Auth;
use App\Http\Controllers\Controller;

class PlaceController extends Controller
{
  public function index(Request $request) {
    echo '';
    $places = Place::orderBy('id', 'asc')->get();
    $categories = Category::orderBy('id', 'asc')->get();
    $selectedCategories =  Category::orderBy('id', 'asc')->lists('id')->toArray();
    return view('home.places', compact('places', 'categories', 'selectedCategories'));
    //TODO: fix returns bad JSON
  }

  public function search(Request $request) {
    echo '';
    $places = Place::orderBy('id', 'asc');
    $categories = explode(' ', $request->categoriesArray);
    for ($i = 0; $i < count($categories); $i++) {
      if ($i == 0) {
        $places = $places->where('category_id', '=', $categories[$i]);
      }
      else {
        $places = $places->orWhere('category_id', '=', $categories[$i]);
      }
    }
    $places = $places->get();
    $selectedCategories = $categories;
    $categories = Category::orderBy('id', 'asc')->get();

    return view('home.places', compact('places', 'categories', 'selectedCategories'));
  }

  public function rate($id, $rating) {
    $user = Auth::user();
		$ratingsPlace = RatingsPlace::firstOrCreate(['user_id' => $user->id, 'place_id' => $id]);
		$ratingsPlace->rating = $rating;
		$ratingsPlace->save();

		return redirect()->route('home.map.index')->with('message', 'El mapa fue puntuada correctamente');
  }
}
