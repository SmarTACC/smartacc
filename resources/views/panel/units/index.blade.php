@extends('layouts.panel')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="index-create-btn">
      <a class="btn green accent-4" href="{{ route('panel.units.create') }}"><i class="material-icons right">add</i>Nueva unidad</a>
    </div>
    @if($units->count())
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
          @foreach($units as $unit)
            <tr>
              <td>{{ $unit->singular_name }}</td>
              <td>
                <a class="btn blue" href="{{ route('panel.units.show', $unit->id) }}"><i class="material-icons right">visibility</i>Ver</a>
              </td>
              <td>
                <a class="btn green accent-4" href="{{ route('panel.units.edit', $unit->id) }}"><i class="material-icons right">edit</i>Editar</a>
              </td>
              <td>
                {!! Form::open(['route' => ['panel.units.destroy', $unit->id], 'method' => 'delete', 'onsubmit' => 'return confirmAction();']) !!}
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
      {!! $units->render() !!}
    @else
      <h3 class="center alert alert-info">No hay unidades</h3>
    @endif
  </div>
</div>
@endsection