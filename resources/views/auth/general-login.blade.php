@extends ('layouts.home', ['section' => 'general-login'])

@section ('content')
<div class="center" id="login-container">
  <h4>Iniciar sesión en SmarTACC</h4>
  <div>
    <a class="btn btn-primary" href="{{ route('social.login', ['google']) }}" id="login-google-button">
      <img src="img/src/login/google.png">
      Iniciar sesión con Google
    </a>
  </div>
  <div>
    <a class="btn blue" href="{{ route('auth.login.email') }}" id="login-email-button">
      <i class="material-icons left">email</i>
      Iniciar sesión con email
    </a>
  </div>
  <div id="no-account">
    <p>¿No tenés cuenta?</p>
    <a class="btn white" href="{{ route('auth.register.general') }}">
      Registrarse
    </a>
  </div>
</div>
@endsection