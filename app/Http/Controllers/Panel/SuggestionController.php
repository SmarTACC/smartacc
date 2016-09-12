<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Panel\SuggestionRequest;
use App\Http\Controllers\Controller;

use App\Suggestion;

class SuggestionController extends Controller
{
  public function index()
  {
		$suggestions = Suggestion::orderBy('id', 'asc')->paginate(20);

		return view('panel.suggestions.index', compact('suggestions'));
  }

  public function show($id)
  {
		$suggestion = Suggestion::findOrFail($id);

		return view('panel.suggestions.show', compact('suggestion'));
  }

  public function create()
  {
		return view('panel.suggestions.create');
  }

  public function store(SuggestionRequest $request)
  {
    $suggestion = Suggestion::create($request->all());

		return redirect()->route('panel.suggestions.show', $place->id);
  }

  public function edit($id)
  {
		$suggestion = Suggestion::findOrFail($id);

		return view('panel.suggestions.edit', compact('suggestion'));
  }

  public function update(SuggestionRequest $request, $id)
  {
		$suggestion = Suggestion::findOrFail($id);
		$suggestion->update($request->all());

		return redirect()->route('panel.suggestions.show', $id);
	}

  public function destroy($id)
  {

    if (!($request->cookie(env("PRIVATE_ACCESS_COOKIE_NAME")) == env("PRIVATE_ACCESS_COOKIE_ADMIN_VALUE"))) {
		  $url = '/panel/prohibitedaction/'.str_replace("/", "%20", $request->url());
		  return redirect($url);
    }

		$suggestion = Suggestion::findOrFail($id);
		$suggestion->delete();

		return redirect()->route('panel.suggestions.index');
	}
}
