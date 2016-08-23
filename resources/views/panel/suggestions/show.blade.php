@extends('layouts.panel')

@section('content')
  <div class="container">
    <div class="divider"></div>
    <div class="section">
      <h5>E-Mail</h5>
      <p>{{ $suggestion->email }}</p>
    </div>
    <div class="divider"></div>
    <div class="section">
      <h5>Descripción</h5>
      <p>{{ $suggestion->description }}</p>
    </div>
    <div class="divider"></div>
    <div class="section">
      <h5>Acciones</h5>
      <a class="btn btn-link" href="{{ route('panel.suggestions.index') }}">
        <i class="material-icons left">arrow_back</i>
        Volver
      </a>
      <a class="btn green accent-4" href="{{ route('panel.suggestions.edit', $suggestion->id) }}">
        <i class="material-icons left">edit</i>
        Editar
      </a>
      {!! Form::open(['route' => ['panel.suggestions.destroy', $suggestion->id], 'method' => 'delete', 'class' => 'show-delete-form', 'onsubmit' => 'if(confirm("Estás seguro que querés eliminarlo de forma permanente?") { return true } else {return false };']) !!}
        <button class="btn smartacc-color" type="submit">
          <i class="material-icons left">delete</i>
          Eliminar
        </button>
      {!! Form::close() !!}
    </div>
  </div>
@endsection