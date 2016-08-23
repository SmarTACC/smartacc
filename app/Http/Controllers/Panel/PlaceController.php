<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Panel\PlaceRequest;
use App\Http\Controllers\Controller;

use App\Place;
use App\Category;
use Validator;

class PlaceController extends Controller
{
  public function index()
  {
		$places = Place::orderBy('name', 'asc')->paginate(20);

		return view('panel.places.index', compact('places'));
  }

  public function show($id)
  {
		$place = Place::findOrFail($id);
		$category = Category::findOrFail($place->category_id);

		return view('panel.places.show', compact('place','category'));
  }

  public function create()
  {
    $categories = Category::lists('name', 'id');

		return view('panel.places.create', compact('categories'));
  }

  public function store(PlaceRequest $request)
  {
    $place = Place::create($request->all());

		return redirect()->route('panel.places.show', $place->id);
  }

  public function edit($id)
  {
		$place = Place::findOrFail($id);
  	$categories = Category::lists('name', 'id');

		return view('panel.places.edit', compact('place','categories'));
  }

  public function update(PlaceRequest $request, $id)
  {
		$place = Place::findOrFail($id);
		$place->update($request->all());

		return redirect()->route('panel.places.show', $id);
	}

  public function destroy($id)
  {
		$place = Place::findOrFail($id);
		$place->delete();

		return redirect()->route('panel.places.index');
	}
}
