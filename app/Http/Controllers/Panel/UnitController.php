<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Panel\UnitRequest;
use App\Http\Controllers\Controller;

use App\Recipe;
use App\Unit;
use App\Ingredient;

class UnitController extends Controller
{
  public function index()
  {
		$units = Unit::orderBy('singular_name', 'asc')->paginate(20);

		return view('panel.units.index', compact('units'));
  }

  public function show($id)
  {
		$unit = Unit::findOrFail($id);

		return view('panel.units.show', compact('unit'));
  }

  public function create()
  {
		return view('panel.units.create');
  }

  public function store(UnitRequest $request)
  {
    $unit = Unit::create($request->all());

		return redirect()->route('panel.units.show', $unit->id);
  }

  public function edit($id)
  {
		$unit = Unit::findOrFail($id);

		return view('panel.units.edit', compact('unit'));
  }

  public function update(UnitRequest $request, $id)
  {
		$unit = Unit::findOrFail($id);
		$unit->update($request->all());

		return redirect()->route('panel.units.show', $id);
	}

  public function destroy($id)
  {
		$unit = Unit::findOrFail($id);
		$unit->delete();

		return redirect()->route('panel.units.index');
	}
}
