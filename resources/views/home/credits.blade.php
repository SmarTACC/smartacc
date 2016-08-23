@extends ('layouts.home', ['section' => 'credits'])

@section ('content')
<div class="container" id="credits-container">
  <p class="credits-title">Aplicación desarrollada por alumnos de la Escuela ORT Argentina</p>
  <div class="credits-text-block">
    <p>Programación</p>
    <p>Santiago Aranguri</p>
    <p>Tobias Carreira</p>
    <p>Pablo Kvitca</p>
    <p>Vladimir Pomsztein</p>
  </div>
  <div class="credits-text-block">
    <p>Diseño</p>
    <p>Natasha Ritzer</p>
  </div>
  <div class="credits-text-block">
    <p>Aporte de Datos</p>
    <p>Melissa Chab</p>
    <p>Alumnos de la Escuela ORT Argentina</p>
  </div>
  <div id="credits-container-images">
    <div id="credits-tic">
      <img src="img/src/credits-tic.png">
    </div>
    <div id="credits-ort">
      <img src="img/src/credits-ort.png" >
    </div>
    <div id="credits-medios">
      <img src="img/src/credits-medios.png">
    </div>
  </div>
  <br>
  <a href="{{ route('suggestions.index') }}" class="btn waves-effect waves-light">
    Escribir sugerencia
  </a>
</div>
@endsection