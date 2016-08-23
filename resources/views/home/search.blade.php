@extends ('layouts.home', ['section' => 'search'])

@section ('content')
<div id="search-container">
  {!! Form::open(['route' => 'recipes.postSearch', 'class' => 'row', 'id' => 'search-recipe-form']) !!}
    <input type="hidden" id="tags-array" name="tagsArray">
    <input type="hidden" id="ingredients-array" name="ingredientsArray">
    <p class="search-text">Por nombre</p>
    <div class="input-field col s12">
      <input type="text" id="recipe-name" name="name">
    </div>
    <p class="search-text">Por categoría</p>
    <div class="input-field col s12 tags-container">
      <select multiple name="tags" id="tags-select">
        <option value="" disabled selected>Sin categorías</option>
        @foreach ($tags as $tag)
          <option>{{ $tag->name }}</option>
        @endforeach
      </select>
    </div>
    <p class="search-text">Por ingredientes</p>
    <div class="input-field col s12 ingredients-container">
      <select multiple name="ingredients" id="ingredients-select">
        <option value="" disabled selected>Sin ingredientes</option>
        @foreach ($ingredients as $ingredient)
          <option>{{ $ingredient->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="no-display">
      @foreach ($tags as $tag)
        <input id="tag-{{ $tag->name }}" type="hidden" value="{{ $tag->id }}">
      @endforeach
      @foreach ($ingredients as $ingredient)
        <input id="ingredient-{{ $ingredient->name }}" type="hidden" value="{{ $ingredient->id }}">
      @endforeach
    </div>
    <div class="center">
      <a class="btn waves-effect waves-light" type="submit" href="#" onclick="submitUploadRecipes();">
        Buscar
      </a>
    </div>
  {!! Form::close() !!}
</div>
@endsection

@section ('scripts')
<script>loadMultipleSelectSearch();</script>
@endsection