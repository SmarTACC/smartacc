@extends('layouts.panel')

@section('content')
<div class="container">
  @include ('errors.list')
  {!! Form::open(['route' => ['panel.tags.update', $tag->id], 'method' => 'put']) !!}
    <div class="section">
      <h5>Nombre</h5>
      {!! Form::text('name', $tag->name) !!}
    </div>
    <a class="btn btn-link pull-right" href="{{ route('panel.tags.index') }}">
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