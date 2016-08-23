<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Panel\TagRequest;
use App\Http\Controllers\Controller;

use App\Recipe;
use App\Tag;
use App\Ingredient;

class TagController extends Controller
{
  public function index()
  {
		$tags = Tag::orderBy('name', 'asc')->paginate(20);

		return view('panel.tags.index', compact('tags'));
  }

  public function show($id)
  {
		$tag = Tag::findOrFail($id);

		return view('panel.tags.show', compact('tag'));
  }

  public function create()
  {
		return view('panel.tags.create');
  }

  public function store(TagRequest $request)
  {
    $tag = Tag::create($request->all());

		return redirect()->route('panel.tags.show', $tag->id);
  }

  public function edit($id)
  {
		$tag = Tag::findOrFail($id);

		return view('panel.tags.edit', compact('tag'));
  }

  public function update(TagRequest $request, $id)
  {
		$tag = Tag::findOrFail($id);
		$tag->update($request->all());

		return redirect()->route('panel.tags.show', $id);
	}

  public function destroy($id)
  {
		$tag = Tag::findOrFail($id);
		$tag->delete();

		return redirect()->route('panel.tags.index');
	}
}
