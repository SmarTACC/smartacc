@extends('layouts.panel')

@section('content')
<div class="container">
  @include('errors.list')
  {!! Form::open(['route' => 'panel.places.index']) !!}
    <div class="section">
      <h5>Nombre</h5>
      {!! Form::text('name') !!}
    </div>
    <div class="section">
      <h5>Dirección</h5>
      {!! Form::text('address', null, ['id' => 'address']) !!}
    </div>
    <div class="section">
      <h5>Descripción</h5>
      {!! Form::text('description') !!}
    </div>
    <div class="section no-overflow-section">
      <h5>Categoría</h5>
      {{ Form::select('category_id', $categories, null, ['placeholder' => 'Seleccionar una categoría']) }}
    </div>
    <div class="section">
      <h5>Dirección en el mapa</h5>
      <div id="map" class="no-display"></div>
      <a class="btn green accent-4" onclick="setLocationShow()">
        <i class="material-icons left">place</i>
        Obtener localización de la dirección
      </a>
    </div>
    <br>
    {!! Form::hidden('lat', null, ['id' => 'lat']) !!}
    {!! Form::hidden('lon', null, ['id' => 'lon']) !!}
    <a class="btn btn-link pull-right" href="{{ route('panel.places.index') }}">
      <i class="material-icons left">arrow_back</i>
      Volver
    </a>
    <button class="btn blue no-display" id="create-save-button" type="submit">
      <i class="material-icons left">save</i>
      Guardar
    </button>
  {!! Form::close() !!}
</div>
@endsection

@section ('scripts')
<script>
  $(document).ready(function() {
    $('select').material_select();
  });
</script>
@endsection