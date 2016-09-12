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
      <p>{!! str_replace("\n", "<br />", $recipe->description) !!}</p>
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
        @if (is_object($recipeIngredient->ingredient))
          @if ($recipeIngredient->amount == 1)
            {{ $recipeIngredient->amount }} <a href="{{ route('panel.units.show', $recipeIngredient->unit->id) }}">{{ $recipeIngredient->unit->singular_name }}</a> de <a href="{{ route('panel.ingredients.show', $recipeIngredient->ingredient->id) }}">{{ $recipeIngredient->ingredient->name }}</a><br>
          @else
            {{ $recipeIngredient->amount }} <a href="{{ route('panel.units.show', $recipeIngredient->unit->id) }}">{{ $recipeIngredient->unit->plural_name }}</a> de <a href="{{ route('panel.ingredients.show', $recipeIngredient->ingredient->id) }}">{{ $recipeIngredient->ingredient->name }}</a><br>
          @endif
        @else
          <div class="card-panel red darken-2 white-text text-darken-2" style="font-size: 1em;">
            <div class="row">
              <div class="col s1">
                <i class="material-icons">report_problem</i>
              </div>
              <div class="col s11">Uno de los ingredientes de esta receta ha sido borrado!!!</div>
              </div>
          </div>
        @endif
      @endforeach
    </div>
    <div class="divider"></div>
    <div class="section">
      <h5>Imagen</h5>
      <img class="show-image" src="../../img/recipes/{{ $recipe->id }}.jpg">
    </div>
    @if ($recipe->calories)
      <div class="divider"></div>
      <div class="section">
        <h5>Calorias</h5>
        <p>{{ $recipe->calories }}</p>
      </div>
    @endif
    @if ($recipe->portions)
      <div class="divider"></div>
      <div class="section">
        <h5>Porciones</h5>
        <p>{{ $recipe->portions }}</p>
      </div>
    @endif
    @if ($recipe->youtube_url)
      <div class="divider"></div>
      <div class="section">
        <h5>Video de youtube</h5>
        <iframe style="width: 100%; height: 550px" frameborder="0" src="https://www.youtube.com/embed/{{ $recipe->youtube_url }}"  allowfullscreen>
        </iframe>
      </div>
    @endif
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