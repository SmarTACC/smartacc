@extends('layouts.panel')

@section('content')
  <div class="container">
    <div class="divider"></div>
    <div class="section">
      <h5>Nombre</h5>
      <p>{{ $category->name }}</p>
    </div>
    <div class="divider"></div>
    <div class="section">
      <h5>Imagen</h5>
      <img src="../../img/categories/{{ $category->id }}.png?{{ uniqid() }}" class="show-category-img">
    </div>
    <div class="divider"></div>
    @if ($category->places->count() != 0)
      <div class="section">
        <h5>Lugares</h5>
        @foreach($category->places as $place)
          <a href="{{ route('panel.places.show', $place->id) }}">{{ $place->name }}</a><br>
        @endforeach
      </div>
      <div class="divider"></div>
    @endif
    <div class="section">
      <h5>Acciones</h5>
      <a class="btn btn-link" href="{{ route('panel.categories.index') }}">
        <i class="material-icons left">arrow_back</i>
        Volver
      </a>
      <a class="btn green accent-4" href="{{ route('panel.categories.edit', $category->id) }}">
        <i class="material-icons left">edit</i>
        Editar
      </a>
      {!! Form::open(['route' => ['panel.categories.destroy', $category->id], 'method' => 'delete', 'class' => 'show-delete-form', 'onsubmit' => 'return confirmAction();']) !!}
        <button class="btn smartacc-color" type="submit">
          <i class="material-icons left">delete</i>
          Eliminar
        </button>
      {!! Form::close() !!}
    </div>
  </div>
@endsection