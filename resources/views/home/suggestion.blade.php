@extends ('layouts.home', ['section' => 'suggest'])

@section ('content')
<div class="container" id="suggest-container">
  {!! Form::open(['route' => 'suggestions.store', 'class' => 'row']) !!}
    <div class="input-field col s12">
      <input type="text" id="email" name="email">
      <label for="email">Correo electrónico</label>
    </div>
    <br>
    <div class="input-field col s12">
      <textarea class="materialize-textarea" id="description" name="description"></textarea>
      <label for="description">Descripción</label>
    </div>
    <div class="center">
      <button type="submit" class="btn waves-effect waves-light">Enviar</button>
    </div>
  {!! Form::close() !!}
</div>
@endsection