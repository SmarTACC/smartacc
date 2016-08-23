@extends ('layouts.home', ['section' => 'map'])

@section ('content')
<div id="map-container">
  {!! Form::open(['route' => 'places.search', 'id' => 'categories-form']) !!}
    <input type="hidden" id="categories-array" name="categoriesArray" value="{{ count($selectedCategories) }}">
    @foreach ($categories as $category)
      <input type="hidden" id="place-{{ $category->name }}" value="{{ $category->id }}">
    @endforeach
    <div class="input-field categories-container">
      <select multiple name="categories" id="categories-select">
        <option value="" disabled selected>Filtrar por categorías</option>
        @foreach ($categories as $category)
          @if (in_array($category->id, $selectedCategories))
            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
          @else
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endif
        @endforeach
        <option class="disabled" id="categories-select-send">
          Enviar
        </option>
      </select>
    </div>
  {!! Form::close() !!}
  <div id="canvas-map"></div>
</div>
@endsection

@section ('scripts')
@if ($places->count() > 0)
  <script>initializeSelect('{{ json_encode($selectedCategories) }}');</script>
  <script>
    $( document ).ready(function() {
      setLocation('{{ json_encode($places) }}');
    });
  </script>
@else
  <p>No hay lugares cargados</p>
@endif
@endsection