@extends ('layouts.home', ['section' => $type])

@section ('content')
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '{{ env("FB_APP_ID") }}',
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
<script src="https://apis.google.com/js/platform.js" async defer></script>
<div class= "center-align">
  <div class="card large" id="recipe-container">
    <div class="card-image">
      <img id="recipe-image" src="../../img/recipes/{{ $recipe->id }}.jpg">
      <span class="card-title" id="recipe-title">{{ $recipe->name }} </span>
    </div>
    <div class="card-content">
      @if ($recipe->youtube_url)
        <iframe style="width: 100%; height: 400px" frameborder="0" src="https://www.youtube.com/embed/{{ $recipe->youtube_url }}"  allowfullscreen>
        </iframe>
      @endif
      <div class="recipe-share-area" style="text-align:center;">
          <a class="fb-like"
             data-href="{{ Request::url() }}"
             data-layout="button"
             data-action="like"
             data-size="small"
             data-show-faces="false"
             data-share="true"><a>
          <a class="g-plusone"
             data-size="medium"
             data-annotation="none"
             data-href="{{ Request::url() }}"></a>
          <script type="text/javascript">
            window.___gcfg = {lang: 'es-419'};
            (function() {
              var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
              po.src = 'https://apis.google.com/js/platform.js';
              var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
            })();
          </script>
          <a href="https://twitter.com/share"
             class="twitter-share-button"
             data-via="SmarTACC_ORT"
             data-hashtags="singluten"
             data-show-count="false"
             data-url="{{ Request::url() }}"
             data-text="Una receta de {{ $recipe->name }} libre de gluten!">Tweet</a>
          <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
      </div>
    </div>
    <div class="card-action">
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
<meta property="fb:app_id"             content="{{ env('FB_APP_ID') }}" />
@endsection