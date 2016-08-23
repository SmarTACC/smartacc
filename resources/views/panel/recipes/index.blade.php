@extends('layouts.panel')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="index-create-btn">
      <a class="btn green accent-4" href="{{ route('panel.recipes.create') }}">
        <i class="material-icons right">add</i>
        Nueva receta
      </a>
    </div>
    @if($recipes->count())
      <table class="striped">
        <thead>
          <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Ver</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
        </thead>
        <tbody>
          @foreach($recipes as $recipe)
            <tr>
              <td><img class="index-image" src="../img/recipes/{{ $recipe->id }}_square.jpg"></td>
              <td>{{ $recipe->name }}</td>
              <td>
                <a class="btn blue" href="{{ route('panel.recipes.show', $recipe->id) }}">
                  <i class="material-icons right">visibility</i>
                  Ver
                </a>
              </td>
              <td>
                <a class="btn green accent-4" href="{{ route('panel.recipes.edit', $recipe->id) }}">
                  <i class="material-icons right">edit</i>
                  Editar
                </a>
              </td>
              <td>
                {!! Form::open(['route' => ['panel.recipes.destroy', $recipe->id], 'method' => 'delete', 'onsubmit' => 'return confirmAction();']) !!}
                  <button class="btn smartacc-color" type="submit">
                    <i class="material-icons right">delete</i>
                    Eliminar
                  </button>
                {!! Form::close() !!}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      {!! $recipes->render() !!}
    @else
      <h3 class="center alert alert-info">No hay recetas</h3>
    @endif
  </div>
</div>
@endsection