@extends('layouts.panel')

@section('content')
  <div class="container">
    <div class="divider"></div>
    <div class="section">
      <h5>Nombre</h5>
      <p>{{ $recipe->name }}</p>
    </div>
    <div class="divider"></div>
    <div class="section">
      <h5>Preparación</h5>
      <p>{{ $recipe->description }}</p>
    </div>
    <div class="divider"></div>
    <div class="section">
      <h5>Categorías</h5>
      @foreach($recipe->tags as $tag)
        <a href="{{ route('panel.tags.show', $tag->id) }}">{{ $tag->name }}</a><br>
      @endforeach
    </div>
    <div class="divider"></div>
    <div class="section">
      <h5>Ingredientes</h5>
      @foreach($recipeIngredients as $recipeIngredient)
        @if ($recipeIngredient->amount == 1)
          {{ $recipeIngredient->amount }} <a href="{{ route('panel.units.show', $recipeIngredient->unit->id) }}">{{ $recipeIngredient->unit->singular_name }}</a> de <a href="{{ route('panel.ingredients.show', $recipeIngredient->ingredient->id) }}">{{ $recipeIngredient->ingredient->name }}</a><br>
        @else
          {{ $recipeIngredient->amount }} <a href="{{ route('panel.units.show', $recipeIngredient->unit->id) }}">{{ $recipeIngredient->unit->plural_name }}</a> de <a href="{{ route('panel.ingredients.show', $recipeIngredient->ingredient->id) }}">{{ $recipeIngredient->ingredient->name }}</a><br>
        @endif
      @endforeach
    </div>
    <div class="divider"></div>
    <div class="section">
      <h5>Imagen</h5>
      <img class="show-image" src="../../img/recipes/{{ $recipe->id }}.jpg">
    </div>
    <div class="divider"></div>
    <div class="section">
      <h5>Acciones</h5>
      <a class="btn btn-link" href="{{ route('panel.recipes.index') }}">
        <i class="material-icons left">arrow_back</i>
        Volver
      </a>
      <a class="btn green accent-4" href="{{ route('panel.recipes.edit', $recipe->id) }}">
        <i class="material-icons left">edit</i>
        Editar
      </a>
      {!! Form::open(['route' => ['panel.recipes.destroy', $recipe->id], 'method' => 'delete', 'class' => 'show-delete-form', 'onsubmit' => 'return confirmAction();']) !!}
        <button class="btn smartacc-color" type="submit">
          <i class="material-icons left">delete</i>
          Eliminar
        </button>
      {!! Form::close() !!}
    </div>
  </div>
@endsection