@extends ('layouts.home', ['section' => $type])

@section ('content')
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1721357034795774',
      xfbml      : true,
      version    : 'v2.7'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/es_LA/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<div class= "center-align">
  <div class="card large" id="recipe-container">
    <div class="card-image">
      <img id="recipe-image" src="../../img/recipes/{{ $recipe->id }}.jpg">
      <span class="card-title" id="recipe-title">{{ $recipe->name }} </span>
    </div>
    <div class="card-content">
      <p class="recipe-subtitle">Ingredientes:</p>
      @if ($ingredients->count() > 0)
        @foreach($ingredients as $ingredient)
          <p class="recipe-text">• {{ $ingredient->name }}</p>
        @endforeach
      @endif
      <div class="card-panel yellow darken-2 white-text text-darken-2" style="font-size: 1em;">
        <div class="row">
          <div class="col s1">
            <i class="material-icons">report_problem</i>
          </div>
          <div class="col s11">Importante! Recuerde siempre utilizar productos certificados por organizaciones oficiales de la salud como Aligmentos Libres de Gluten (ALGs). <a href="http://www.anmat.gov.ar/Enfermedad_Celiaca/principal.asp" target="_blank">Mas info</a>.</div>
        </div>
      </div>
      <br>
      <p class="recipe-subtitle">Categorías:</p>
      @if ($tags->count() > 0)
        @foreach($tags as $tag)
          <p class="recipe-text">• {{ $tag->name }}</p>
        @endforeach
      @endif
      <br>
      <p class="recipe-subtitle">Preparación:</p>
      <p class="recipe-text">{{ $recipe->description }}</p>
    </div>
    <div class="card-action">
     <!-- <a class="fb-share-button"-->
		   <!-- data-href="{{ //todo }}"-->
		   <!-- data-layout="button_count">-->
	    <!--</div>-->
     <!-- <a href="#">Puntuar!</a>-->
    </div>
    <!--<p class="recipe-subtitle">Puntuación:</p>-->
    <!--<div id="stars">-->
    <!--  <i id="star1" class="material-icons rating-star" onmouseover="hoverStar(1)" onmouseout="outStar(5)" onclick="location.href='{{ route('recipes.rate', [$recipe->id, $type, 1]) }}'">star_border</i>-->
    <!--  <i id="star2" class="material-icons rating-star" onmouseover="hoverStar(2)" onmouseout="outStar(5)" onclick="location.href='{{ route('recipes.rate', [$recipe->id, $type, 2]) }}'">star_border</i>-->
    <!--  <i id="star3" class="material-icons rating-star" onmouseover="hoverStar(3)" onmouseout="outStar(5)" onclick="location.href='{{ route('recipes.rate', [$recipe->id, $type, 3]) }}'">star_border</i>-->
    <!--  <i id="star4" class="material-icons rating-star" onmouseover="hoverStar(4)" onmouseout="outStar(5)" onclick="location.href='{{ route('recipes.rate', [$recipe->id, $type, 4]) }}'">star_border</i>-->
    <!--  <i id="star5" class="material-icons rating-star" onmouseover="hoverStar(5)" onmouseout="outStar(5)" onclick="location.href='{{ route('recipes.rate', [$recipe->id, $type, 5]) }}'">star_border</i>-->
    <!--</div>-->
    <!--<p id="starMessage" class="recipe-text"></p>-->
  </div>
</div>
@endsection

@section ('scripts')
@if ($rating)
  <script>hoverStar('{{ $rating->rating }}');</script>
@endif
@endsection

@section ('head')
<meta property="og:url"                content="" />
<meta property="og:type"               content="restaurant.menu_item" />
<meta property="og:title"              content="" />
<meta property="og:description"        content="" />
<meta property="og:image"              content="" />
<meta property="og:site_name"          content="SmarTACC" />
<meta property="fb:app_id"             content="1721357034795774" />
@endsection