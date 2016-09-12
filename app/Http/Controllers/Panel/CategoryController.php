<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Panel\StoreCategoryRequest;
use App\Http\Requests\Panel\UpdateCategoryRequest;
use App\Http\Controllers\Controller;

use App\Category;
use App\Places;
use Image;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
  public function index()
  {
		$categories = Category::orderBy('name', 'asc')->paginate(20);

		return view('panel.categories.index', compact('categories'));
  }

  public function show($id)
  {
		$category = Category::findOrFail($id);

		return view('panel.categories.show', compact('category'));
  }

  public function create()
  {
		return view('panel.categories.create');
  }

  public function store(StoreCategoryRequest $request)
  {
  	$category = Category::create($request->all());

		if($request->hasFile('image')) {
			saveImage('category', $category->id);
    }

		return redirect()->route('panel.categories.show', $category->id);
  }

  public function edit($id)
  {
		$category = Category::findOrFail($id);

		return view('panel.categories.edit', compact('category'));
  }

  public function update(UpdateCategoryRequest $request, $id)
  {
		$category = Category::findOrFail($id);
		$category->update($request->all());

		if($request->hasFile('image')) {
			saveImage('category', $id);
    }
    return redirect()->route('panel.categories.show', $id);
	}

  public function destroy(Request $request, $id)
  {
    if (!($request->cookie(env("PRIVATE_ACCESS_COOKIE_NAME")) == env("PRIVATE_ACCESS_COOKIE_ADMIN_VALUE"))) {
		  $url = '/panel/prohibitedaction/'.str_replace("/", "%20", $request->url());
		  return redirect($url);
    }
		$category = Category::findOrFail($id);
  	$category->delete();
	  return redirect()->route('panel.categories.index');
	}
}
