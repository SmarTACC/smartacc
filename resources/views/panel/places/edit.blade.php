@extends('layouts.panel')

@section('content')
<div class="container">
  @include ('errors.list')
  {!! Form::open(['route' => ['panel.places.show', $place->id], 'method' => 'put']) !!}
    <div class="section">
      <h5>Nombre</h5>
      {!! Form::text('name', $place->name) !!}
    </div>
    <div class="section">
      <h5>Dirección</h5>
      {!! Form::text('address', $place->address, ['id' => 'address']) !!}
    </div>
    <div class="section">
      <h5>Descripción</h5>
      {!! Form::text('description', $place->description) !!}
    </div>
    <div class="section">
      <h5>Categoría</h5>
      {{ Form::select('category_id', $categories, $place->category_id, ['placeholder' => 'Seleccionar una categoría']) }}
    </div>
    <div class="section">
      <div id="map"></div>
      <button class="btn green accent-4" type="submit" onclick="getLocation()">
        <i class="material-icons left">place</i>
        Obtener localización
      </button>
    </div>
    <br>
    {!! Form::hidden('lat', null, ['id' => 'lat']) !!}
    {!! Form::hidden('lon', null, ['id' => 'lon']) !!}
    <a class="btn btn-link pull-right" href="{{ route('panel.places.index') }}">
      <i class="material-icons left">arrow_back</i>
      Volver
    </a>
    <button type="submit" class="btn blue">
      <i class="material-icons left">save</i>
      Guardar
    </button>
  {!! Form::close() !!}
</div>
<script>setLocationEdit('{{ $place->lat }}','{{ $place->lon }}');</script>
@endsection