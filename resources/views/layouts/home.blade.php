<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>SmarTACC</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <meta name="viewport" content="width=device-width" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css', [], false) !!}
    {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css', [], false) !!}
    {!! Html::style('css/home/style.css', [], env("SECURE_LOADING")) !!}
    @yield('head')
  </head>
  <body>
    <div class="navbar-fixed">
      <nav>
        <div class="nav-wrapper">
          <?php
            $displayTitle = $displayNavCredits = $displayNavSuggest = $displayNavRecipe = $displayNavSearch = $displayNavSearchList = $displayNavSearchRecipe = 'display';
            $displayTabRecipes = $displayTabMap = $displayTabSearch = '';
          ?>
          @if ($section == 'credits' || $section == 'recipe' || $section == 'suggest' || $section == 'search-list' || $section == 'search-recipe')
            <?php $displayTitle = 'no-display-imp'; ?>
          @endif
          @if ($section != 'credits')
            <?php $displayNavCredits = 'no-display-imp'; ?>
          @endif
          @if ($section != 'suggest')
            <?php $displayNavSuggest = 'no-display-imp'; ?>
          @endif
          @if ($section != 'recipe')
            <?php $displayNavRecipe = 'no-display-imp'; ?>
          @endif
          @if ($section != 'search-list')
            <?php $displayNavSearchList = 'no-display-imp'; ?>
          @endif
          @if ($section != 'search-recipe')
            <?php $displayNavSearchRecipe = 'no-display-imp'; ?>
          @endif
          @if ($section == 'recipes')
            <?php $displayTabRecipes = 'active'; ?>
          @endif
          @if ($section == 'map')
            <?php $displayTabMap = 'active'; ?>
          @endif
          @if ($section == 'search')
            <?php $displayTabSearch = 'active'; ?>
          @endif
          @if (Auth::check())
            <?php $displayNavLogin = 'no-display-imp'; ?>
            <?php $displayNavLogout = ''; ?>
          @else
            <?php $displayNavLogin = ''; ?>
            <?php $displayNavLogout = 'no-display-imp'; ?>
          @endif
          <a href="{{ route('recipes.index') }}" class="{{ $displayTitle }} nav-title brand-logo" id="nav-title">SmarTACC</a>
          <a href="{{ route('auth.logout') }}" class="{{ $displayTitle }} {{ $displayNavLogout }} no-display" id="logout-li"><i class="material-icons">exit_to_app</i></a>
          <!--
            <a href="{{ route('auth.login.general') }}" class="{{ $displayTitle }} {{ $displayNavLogin }} no-display" id="login-li"><i class="material-icons">person</i></a>
          -->
          <a href="credits" class="{{ $displayTitle }} no-display" id="credits-li"><i class="material-icons">assignment</i></a>
          <div class="{{ $displayNavCredits }} nav-other-titles" id="nav-credits">
            <a href="{{ route('recipes.index') }}" class="back-button" id="nav-credits-back-button"><i class="material-icons">arrow_back</i></a>
            <a class="nav-subtitle" id="nav-credits-title">Créditos y sugerencias</a>
          </div>
          <div class="{{ $displayNavSuggest }} nav-other-titles" id="nav-suggest">
            <a href="{{ route('credits.index') }}" class="back-button" id="nav-suggest-back-button"><i class="material-icons">arrow_back</i></a>
            <a class="nav-subtitle" id="nav-suggest-title">Sugerencia</a>
          </div>
          <div class="{{ $displayNavRecipe }} nav-other-titles" id="nav-recipe">
            <a href="{{ route('recipes.index') }}" class="back-button" id="nav-recipe-back-button"><i class="material-icons">arrow_back</i></a>
            <a class="nav-subtitle" id="nav-recipe-title">Receta</a>
          </div>
          <div class="{{ $displayNavSearchList }} nav-other-titles" id="nav-search-list">
            <a href="{{ route('recipes.search') }}" class="back-button" id="nav-search-list-back-button"><i class="material-icons">arrow_back</i></a>
            <a class="nav-subtitle" id="nav-search-list-title">Búsqueda</a>
          </div>
          <div class="{{ $displayNavSearchRecipe }} nav-other-titles" id="nav-search-recipe">
            <a href="javascript:history.go(-1)" class="back-button" id="nav-search-recipe-back-button"><i class="material-icons">arrow_back</i></a>
            <a class="nav-subtitle" id="nav-search-recipe-title">Receta</a>
          </div>
          <ul class="right hide-on-med-and-down navbar-buttons">
            <li id="index-li"><a href="{{ route('recipes.index') }}">Recetas</a></li>
            <li id="map-li"><a href="{{ route('places.index') }}">Mapa</a></li>
            <li id="search-li"><a href="{{ route('recipes.search') }}">Búsqueda</a></li>
            <li id="credits-li"><a href="{{ route('credits.index') }}">Créditos</a></li>
            <!--
              <li id="login-li" class="{{ $displayNavLogin }}"><a href="{{ route('auth.login.general') }}">Iniciar sesión</a></li>
            -->
            <li id="logout-li" class="{{ $displayNavLogout }}"><a href="{{ route('auth.logout') }}">Salir</a></li>
          </ul>
        </div>
      </nav>
    </div>
    @if ($section == 'recipes' || $section == 'map' || $section == 'search' || $section == 'list')
      <div class="col s12" id="tabs-container">
        <ul class="tabs" id="tabs">
          <li class="tab col s4" onclick="location.href='{{ route('recipes.index') }}'"><a id="tabs-recipes" class="{{ $displayTabRecipes }}">Recetas</a></li>
          <li class="tab col s4" onclick="location.href='{{ route('places.index') }}'"><a id="tabs-map" class="{{ $displayTabMap }}">Mapa</a></li>
          <li class="tab col s4" onclick="location.href='{{ route('recipes.search') }}'"><a id="tabs-search" class="{{ $displayTabSearch }}">Búsqueda</a></li>
        </ul>
      </div>
    @endif
    @yield('content')
    {!! Html::script("https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js", [], env("SECURE_LOADING")) !!}
    {!! Html::script("https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js", [], env("SECURE_LOADING")) !!}
    {!! Html::script("https://unpkg.com/masonry-layout@4.0.0/dist/masonry.pkgd.min.js", [], env("SECURE_LOADING")) !!}
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initialize" async defer></script>
    <!-- <script src="http://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false" async defer></script>-->
    {!! Html::script('js/home/main.js', array(), env("SECURE_LOADING")) !!}
    @yield('scripts')
    <script>
      $(".button-collapse").sideNav();
      $('.grid').masonry({
        itemSelector: '.grid-item',
        columnWidth: 0
      });
    </script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-83300538-1', 'auto');
      ga('send', 'pageview');

    </script>
  </body>
</html>