@extends ('layouts.home', ['section' => $type])

@section ('content')
<div id="recipes-container">
  @if ($recipes->count() > 0)
    <div class="grid">
      @foreach ($recipes as $recipe)
        <div class="grid-item" onclick="location.href='{{ route('recipes.show', [$recipe->id, $type]) }}'">
          <img class="image-wall" src="img/recipes/{{ $recipe->id }}_square.jpg">
          <div class="inline-title-wall">
            <div class="wrap-title-wall">
              <p class="title-wall">{{ $recipe->name }}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @else
    <p>No hay recetas</p>
  @endif
</div>
@endsection