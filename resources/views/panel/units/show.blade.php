@extends('layouts.panel')

@section('content')
  <div class="container">
    <div class="section">
      <h5>Nombre en singular</h5>
      @if ($unit->singular_name)
        <p>{{ $unit->singular_name }}</p>
      @else
        <p>No tiene nombre en singular</p>
      @endif
    </div>
    <div class="divider"></div>
    <div class="section">
      <h5>Nombre en plural</h5>
      @if ($unit->plural_name)
        <p>{{ $unit->plural_name }}</p>
      @else
        <p>No tiene nombre en plural</p>
      @endif
    </div>
    <div class="divider"></div>
    <div class="section">
      <h5>Acciones</h5>
      <a class="btn btn-link" href="{{ route('panel.units.index') }}">
        <i class="material-icons left">arrow_back</i>
        Volver
      </a>
      <a class="btn green accent-4" href="{{ route('panel.units.edit', $unit->id) }}">
        <i class="material-icons left">edit</i>
        Editar
      </a>
      {!! Form::open(['route' => ['panel.units.destroy', $unit->id], 'method' => 'delete', 'class' => 'show-delete-form', 'onsubmit' => 'return confirmAction();']) !!}
        <button class="btn smartacc-color" type="submit">
          <i class="material-icons left">delete</i>
          Eliminar
        </button>
      {!! Form::close() !!}
    </div>
  </div>
@endsection