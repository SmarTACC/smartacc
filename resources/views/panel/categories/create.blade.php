@extends('layouts.panel')

@section('content')
<div class="container">
  @include ('errors.list')
	{!! Form::open(['route' => 'panel.categories.index', 'files' => true]) !!}
		<div class="section">
			<h5>Nombre</h5>
			{!! Form::text('name') !!}
		</div>
		<div class="section">
			<h5>Imagen</h5>
			<div class="file-field input-field">
				<div class="btn">
					<span>Imagen</span>
					{!! Form::file('image') !!}
				</div>
				<div class="file-path-wrapper">
					<input class="file-path validate" type="text">
				</div>
			</div>
		</div>
		<a class="btn btn-link pull-right" href="{{ route('panel.categories.index') }}">
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