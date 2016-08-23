@extends('layouts.panel')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="index-create-btn">
      <a class="btn green accent-4" href="{{ route('panel.categories.create') }}"><i class="material-icons right">add</i>Nueva categoría de lugares</a>
    </div>
    @if($categories->count())
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
          @foreach($categories as $category)
            <tr>
              <td><img class="index-image" src="../img/categories/{{ $category->id }}.png"></td>
              <td>{{ $category->name }}</td>
              <td>
                <a class="btn blue" href="{{ route('panel.categories.show', $category->id) }}"><i class="material-icons right">visibility</i>Ver</a>
              </td>
              <td>
                <a class="btn green accent-4" href="{{ route('panel.categories.edit', $category->id) }}"><i class="material-icons right">edit</i>Editar</a>
              </td>
              <td>
                {!! Form::open(['route' => ['panel.categories.destroy', $category->id], 'method' => 'delete', 'onsubmit' => 'return confirmAction();']) !!}
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
      {!! $categories->render() !!}
    @else
      <h3 class="center alert alert-info">No hay categorías de lugares</h3>
    @endif
  </div>
</div>
@endsection