<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>SmarTACC ADM</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css"/>
    {!! Html::style('css/panel/jquery.tokenize.css', array(), true) !!}
    {!! Html::style('css/panel/style.css', array(), true) !!}
  </head>
  <body>
    <div class="navbar-fixed">
      <nav>
        <div class="nav-wrapper">
          <a href="{{ route('panel.index') }}" class="nav-title brand-logo" id="nav-title">SmarTACC ADM</a>
          <ul class="right hide-on-med-and-down navbar-buttons">
            <li id="recipes-li"><a href="{{ route('panel.recipes.index') }}">Recetas</a></li>
            <li id="categories-li"><a href="{{ route('panel.tags.index') }}">Categorías</a></li>
            <li id="ingredients-li"><a href="{{ route('panel.ingredients.index') }}">Ingredientes</a></li>
            <li id="units-li"><a href="{{ route('panel.units.index') }}">Unidades</a></li>
            <li id="places-li"><a href="{{ route('panel.places.index') }}">Lugares</a></li>
            <li id="places-categories-li"><a href="{{ route('panel.categories.index') }}">Categorías de lugares</a></li>
            <li id="suggestions-li"><a href="{{ route('panel.suggestions.index') }}">Sugerencias</a></li>
          </ul>
        </div>
      </nav>
    </div>
    @yield('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    {!! Html::script('js/panel/jquery.tokenize.js', array(), true) !!}
    {!! Html::script('js/panel/main.js', array(), true) !!}
    @yield('scripts')
    <script>
      $(".button-collapse").sideNav();
    </script>
  </body>
</html>