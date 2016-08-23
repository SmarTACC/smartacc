@extends('layouts.panel')

@section('content')
  <div class="container">
    <div class="divider"></div>
    <div class="section">
      <h5>Nombre</h5>
      <p>{{ $place->name }}</p>
    </div>
    <div class="divider"></div>
    <div class="section">
      <h5>Dirección</h5>
      <p>{{ $place->address }}</p>
    </div>
    <div class="divider"></div>
    <div class="section">
      <h5>Descripción</h5>
      <p>{{ $place->description }}</p>
    </div>
    <div class="divider"></div>
    <div class="section">
      <h5>Categoría</h5>
      <p>{{ $category->name }}</p>
    </div>
    <div class="divider"></div>
    <div class="section">
      <h5>Mapa</h5>
      <div id="map"></div>
    </div>
    <div class="divider"></div>
    <div class="section">
      <h5>Acciones</h5>
      <a class="btn btn-link" href="{{ route('panel.places.index') }}">
        <i class="material-icons left">arrow_back</i>
        Volver
      </a>
      <a class="btn green accent-4" href="{{ route('panel.places.edit', $place->id) }}">
        <i class="material-icons left">edit</i>
        Editar
      </a>
      {!! Form::open(['route' => ['panel.places.destroy', $place->id], 'method' => 'delete', 'class' => 'show-delete-form', 'onsubmit' => 'return confirmAction();']) !!}
        <button class="btn smartacc-color" type="submit">
          <i class="material-icons left">delete</i>
          Eliminar
        </button>
      {!! Form::close() !!}
    </div>
  </div>
  <script>initMapShow('{{ $place->name }}','{{ $place->address }}','{{ $place->description }}','{{ $place->category_id }}','{{ $place->lat }}','{{ $place->lon }}');</script>
@endsection