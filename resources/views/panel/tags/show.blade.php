@extends('layouts.panel')

@section('content')
  <div class="container">
    <div class="divider"></div>
    <div class="section">
      <h5>Nombre</h5>
      <p>{{ $tag->name }}</p>
    </div>
    <div class="divider"></div>
    @if ($tag->recipes->count() != 0)
      <div class="section">
        <h5>Recetas</h5>
        @foreach($tag->recipes as $recipe)
          <a href="{{ route('panel.recipes.show', $recipe->id) }}">{{ $recipe->name }}</a><br>
        @endforeach
      </div>
      <div class="divider"></div>
    @endif
    <div class="section">
      <h5>Acciones</h5>
      <a class="btn btn-link" href="{{ route('panel.tags.index') }}">
        <i class="material-icons left">arrow_back</i>
        Volver
      </a>
      <a class="btn green accent-4" href="{{ route('panel.tags.edit', $tag->id) }}">
        <i class="material-icons left">edit</i>
        Editar
      </a>
      {!! Form::open(['route' => ['panel.tags.destroy', $tag->id], 'method' => 'delete', 'class' => 'show-delete-form', 'onsubmit' => 'return confirmAction();']) !!}
        <button class="btn smartacc-color" type="submit">
          <i class="material-icons left">delete</i>
          Eliminar
        </button>
      {!! Form::close() !!}
    </div>
  </div>
@endsection