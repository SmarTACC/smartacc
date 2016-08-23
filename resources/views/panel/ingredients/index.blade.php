@extends('layouts.panel')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="index-create-btn">
      <a class="btn green accent-4" href="{{ route('panel.ingredients.create') }}"><i class="material-icons right">add</i>Nuevo ingrediente</a>
    </div>
    @if($ingredients->count())
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
          @foreach($ingredients as $ingredient)
            <tr>
              <td>{{ $ingredient->name }}</td>
              <td>
                <a class="btn blue" href="{{ route('panel.ingredients.show', $ingredient->id) }}"><i class="material-icons right">visibility</i>Ver</a>
              </td>
              <td>
                <a class="btn green accent-4" href="{{ route('panel.ingredients.edit', $ingredient->id) }}"><i class="material-icons right">edit</i>Editar</a>
              </td>
              <td>
                {!! Form::open(['route' => ['panel.ingredients.destroy', $ingredient->id], 'method' => 'delete', 'onsubmit' => 'return confirmAction();']) !!}
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
      {!! $ingredients->render() !!}
    @else
      <h3 class="center alert alert-info">No hay ingredientes</h3>
    @endif
  </div>
</div>
@endsection