@extends ('layouts.home', ['section' => 'register'])

@section ('content')
<div class="container" id="login-container">
  <h4>Registrarse en SmarTACC</h4>
  @include ('errors.list')
  {!! Form::open(['url' => 'auth/register']) !!}
    <div class="input-field" id="register-name">
      {!! Form::text('name', null, ['class' => 'validate']) !!}
      {!! Form::label('name', 'Nombre completo') !!}
    </div>
    <div class="input-field" id="register-email">
      {!! Form::text('email', null, ['class' => 'validate']) !!}
      {!! Form::label('email', 'Correo electrónico') !!}
    </div>
    <div class="input-field" id="register-password">
      {!! Form::password('password', null, ['class' => 'validate']) !!}
      {!! Form::label('password', 'Contraseña') !!}
    </div>
    <button type="submit" class="btn waves-effect waves-light" id="register-button">Registrarse</button>
  {!! Form::close() !!}
</div>
@endsection