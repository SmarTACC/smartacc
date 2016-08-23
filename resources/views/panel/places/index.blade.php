@extends('layouts.panel')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="index-create-btn">
      <a class="btn green accent-4" href="{{ route('panel.places.create') }}"><i class="material-icons right">add</i>Nuevo lugar</a>
    </div>
    @if($places->count())
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
          @foreach($places as $place)
            <tr>
              <td>{{ $place->name }}</td>
              <td>
                <a class="btn blue" href="{{ route('panel.places.show', $place->id) }}"><i class="material-icons right">visibility</i>Ver</a>
              </td>
              <td>
                <a class="btn green accent-4" href="{{ route('panel.places.edit', $place->id) }}"><i class="material-icons right">edit</i>Editar</a>
              </td>
              <td>
                {!! Form::open(['route' => ['panel.places.destroy', $place->id], 'method' => 'delete', 'onsubmit' => 'return confirmAction();']) !!}
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
      {!! $places->render() !!}
    @else
      <h3 class="center alert alert-info">No hay lugares</h3>
    @endif
  </div>
</div>
@endsection