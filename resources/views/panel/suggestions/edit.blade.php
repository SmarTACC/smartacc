@extends('layouts.panel')

@section('content')
  <div class="container">
    @include ('errors.list')
    {!! Form::open(['route' => ['panel.suggestions.update', $suggestion->id], 'method' => 'put']) !!}
      <div class="section">
        <h5>E-Mail</h5>
        {!! Form::text('email', $suggestion->email) !!}
      </div>
      <div class="section">
        <h5>Descripción</h5>
        {!! Form::textarea('description', $suggestion->description, ['class' => 'materialize-textarea']) !!}
      </div>
      <a class="btn btn-link pull-right" href="{{ route('panel.suggestions.index') }}">
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