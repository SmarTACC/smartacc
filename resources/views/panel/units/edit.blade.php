@extends('layouts.panel')

@section('content')
<div class="container">
  @include ('errors.list')
  {!! Form::open(['route' => ['panel.units.update', $unit->id], 'method' => 'put']) !!}
    <div class="section">
      <h5>Nombre en singular</h5>
      {!! Form::text('singular_name', $unit->singular_name) !!}
    </div>
    <div class="section">
      <h5>Nombre en plural</h5>
      {!! Form::text('plural_name', $unit->plural_name) !!}
    </div>
    <a class="btn btn-link pull-right" href="{{ route('panel.units.index') }}">
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