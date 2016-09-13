@extends('layouts.panel')

@section('content')
<div class="container">
  @include('errors.list')
  {!! Form::open(['route' => ['panel.recipes.update', $recipe->id], 'method' => 'put', 'files' => true]) !!}
    <div class="section">
      <h5>Nombre</h5>
      {!! Form::text('name', $recipe->name) !!}
    </div>
    <div class="section">
      <h5>Preparación</h5>
      {!! Form::textarea('description', $recipe->description, ['class' => 'materialize-textarea']) !!}
    </div>
    <div class="section no-overflow-section">
      <h5>Categorías</h5>
      <select multiple="multiple" name="tags[]" id="tagTokenize" class="tokenize-sample tag-tokenize">
        @if ($tags)
          @foreach ($allTags as $tag)
            @if (in_array($tag->id, $tags))
              <option value="{{ $tag->id }}" selected>{{ $tag->name }}</option>
            @else
              <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endif
          @endforeach
        @else
          @foreach ($allTags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
          @endforeach
        @endif
      </select>
    </div>
    <h5>Ingredientes</h5>
    <div id="ingredients-table">
      <div id="ingredient-col">
        <div class="ingredients-text">
          <p>Ingrediente</p>
          <?php $i = 0; ?>
          @foreach ($recipeIngredients as $recipeIngredient)
            <p id="ingredient_{{ $i }}">{{ $recipeIngredient->ingredient->name }}</p>
            <?php $i++; ?>
          @endforeach
        </div>
        <select multiple="multiple" name="ingredients[]" id="ingredientTokenize" class="tokenize-sample ingredient-tokenize">
          @foreach ($allIngredients as $ingredient)
            <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
          @endforeach
        </select>
      </div>
      <div id="amount-col">
        <div class="ingredients-text">
          <p>Cantidad</p>
          <?php $i = 0; ?>
          @foreach ($recipeIngredients as $recipeIngredient)
            <p id="amount_{{ $i }}">{{ $recipeIngredient->amount }}</p>
            <?php $i++; ?>
          @endforeach
        </div>
        {!! Form::text('amount', null, ['id' => 'amount']) !!}
      </div>
      <div id="unit-col">
        <div class="ingredients-text">
          <p>Unidad</p>
          <?php $i = 0; ?>
          @foreach ($recipeIngredients as $recipeIngredient)
            @if ($recipeIngredient->amount == 1)
              <p id="unit_{{ $i }}">{{ $recipeIngredient->unit->singular_name }}</p>
            @else
              <p id="unit_{{ $i }}">{{ $recipeIngredient->unit->plural_name }}</p>
            @endif
            <?php $i++; ?>
          @endforeach
        </div>
        <select multiple="multiple" name="units[]" id="unitTokenize" class="tokenize-sample unit-tokenize">
          @foreach ($units as $unit)
            @if ($unit->singular_name == $unit->plural_name)
              <option value="{{ $unit->id }}">{{ $unit->singular_name }}</option>
            @else
              <option value="{{ $unit->id }}">{{ $unit->singular_name }}</option>
              <option value="{{ $unit->id }}">{{ $unit->plural_name }}</option>
            @endif
          @endforeach
        </select>
      </div>
      <div id="action-col">
        <div class="ingredients-text">
          <p>Acción</p>
          <?php $i = 0; ?>
          @foreach ($recipeIngredients as $recipeIngredient)
            <p id="button_{{ $i }}" class="ingredient-button">
              <a class="btn red" onclick="deleteIngredient({{ $i }})">Eliminar</a>
            </p>
            <?php $i++; ?>
          @endforeach
        </div>
        <div class="center add-ingredient">
          <a class="btn btn-link pull-right" onclick="addIngredient()"><i class="material-icons left">add</i>Agregar</a>
        </div>
      </div>
      <div class="values no-display">
        {!! Form::text('total_values', null, ['id' => 'total_values']) !!}
      </div>
    </div>
    <div class="section no-overflow-section">
      <h5>Imagen actual</h5>
      <img class="edit-image" src="../../../img/recipes/{{ $recipe->id }}.jpg">
    </div>
    <div class="section no-overflow-section">
      <h5>Cambiar imagen</h5>
      <div class="file-field input-field">
        <div class="btn">
          <span>Imagen</span>
          {!! Form::file('image') !!}
        </div>
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text">
        </div>
      </div>
    </div>
    <div class="section">
      <h5>Calorias</h5>
      {!! Form::number('calories', $recipe->calories) !!}
    </div>
    <div class="section">
      <h5>Porciones</h5>
      {!! Form::number('portions', $recipe->portions) !!}
    </div>
    <div class="section">
      <h5>Url de youtube (poner solo el código, por ejemplo si el video fuera https://www.youtube.com/watch?v=GRxofEmo3HA, poner GRxofEmo3HA)</h5>
      {!! Form::text('youtube_url', $recipe->youtube_url) !!}
    </div>
    <a class="btn btn-link pull-right" href="{{ route('panel.recipes.index') }}">
      <i class="material-icons left">arrow_back</i>
      Volver
    </a>
    <button type="submit" class="btn blue">
      <i class="material-icons left">save</i>
      Guardar
    </button>
  {!! Form::close() !!}
</div>
@endsection

@section('scripts')
<script>$('#tagTokenize').tokenize();</script>
<script>$('#ingredientTokenize').tokenize({'maxElements': 1, 'newElements': false});</script>
<script>$('#unitTokenize').tokenize({'maxElements': 1, 'newElements': false});</script>
@foreach ($recipeIngredients as $recipeIngredient)
  <script>
    addValue('{{ $recipeIngredient->amount }}', '{{ $recipeIngredient->ingredient->id }}', '{{ $recipeIngredient->unit->id }}');
  </script>
@endforeach
@endsection