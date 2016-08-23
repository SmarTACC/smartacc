@extends('layouts.panel')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="index-create-btn">
      <a class="btn green accent-4" href="{{ route('panel.tags.create') }}"><i class="material-icons right">add</i>Nueva categoría</a>
    </div>
    @if($tags->count())
      <table class="striped">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Ver</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
        </thead>
        <tbody>
          @foreach($tags as $tag)
            <tr>
              <td>{{ $tag->name }}</td>
              <td>
                <a class="btn blue" href="{{ route('panel.tags.show', $tag->id) }}"><i class="material-icons right">visibility</i>Ver</a>
              </td>
              <td>
                <a class="btn green accent-4" href="{{ route('panel.tags.edit', $tag->id) }}"><i class="material-icons right">edit</i>Editar</a>
              </td>
              <td>
                {!! Form::open(['route' => ['panel.tags.destroy', $tag->id], 'method' => 'delete', 'onsubmit' => 'return confirmAction();']) !!}
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
      {!! $tags->render() !!}
    @else
      <h3 class="center alert alert-info">No hay categorías</h3>
    @endif
  </div>
</div>
@endsection