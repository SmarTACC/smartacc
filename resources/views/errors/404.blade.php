@extends ('layouts.home', ['section' => 'credits'])

@section('content')
<div class="valign-wrapper">
  <div class="row" style="width:90%;">
    <div class="col s12">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text" style="text-align:center;">
          <span class="card-title">Error 404</span>
          <p>Pagina no encontrada, lo sentimos</p>
          <p><img src="img/src/bad-wolf.png" width="75px" style="opacity:0.0125;"></p>
        </div>
        <div class="card-action">
          <a href="/">Ir al Inicio</a>
          <a href="mailto:smartacc@ort.edu.ar">Reportar un error</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection