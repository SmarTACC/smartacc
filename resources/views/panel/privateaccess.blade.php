<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
{!! Html::style('css/panel/style.css', array(), true) !!}
<div class="center" id="adm-index-container">
  <form action="/privateaccess" method="post">
    <h5>Poner contraseña para ingresar al panel</h5>
    <br>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input style="width:300px;" type="password" id="clave" name="clave"/>
    <br>
    <input class="btn btn-link pull-right" type="submit" value="Ingresar">
    </input>
  </form>
</div>