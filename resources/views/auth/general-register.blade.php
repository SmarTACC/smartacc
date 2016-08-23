@extends ('layouts.home', ['section' => 'general-register'])

@section ('content')
<div class="container" id="login-container">
  <h4>Regisrarse en SmarTACC</h4>
  <div>
    <a class="btn btn-primary" href="{{ route('social.login', ['google']) }}" id="login-google-button">
      <img src="img/src/login/google.png">
      Registrarse con Google
    </a>
  </div>
  <div>
    <a class="btn blue" href="{{ route('auth.register.email') }}" id="login-email-button">
      <i class="material-icons left">email</i>
      Registrarse con email
    </a>
  </div>
  <div id="no-account">
    <p>¿Ya tenés unas cuenta?</p>
    <a class="btn white" href="{{ route('auth.login.general') }}">
      Iniciar sesión
    </a>
  </div>
</div>
@endsection