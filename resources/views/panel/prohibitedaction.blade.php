<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
{!! Html::style('css/panel/style.css', array(), true) !!}
<div class="center" id="adm-index-container">
  <h3>No tienes permisos para hacer eso.</h3>
  <h4>Por favor contacta un administrador.</h4>
  <a class="btn btn-link pull-right" href="{{ str_replace(' ', '/', $referer) }}">Volver</a>
</div>