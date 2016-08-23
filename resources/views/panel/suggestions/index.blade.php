@extends('layouts.panel')

@section('content')
<div class="row">
  <div class="col-md-12">
    @if($suggestions->count())
      <table class="striped">
        <thead>
          <tr>
            <th>E-Mail</th>
            <th>Descripción</th>
            <th>Ver</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
        </thead>
        <tbody>
          @foreach($suggestions as $suggestion)
            <tr>
              <td>{{ $suggestion->email }}</td>
              <td>{{ $suggestion->description }}</td>
              <td>
                <a class="btn blue" href="{{ route('panel.suggestions.show', $suggestion->id) }}"><i class="material-icons right">visibility</i>Ver</a>
              </td>
              <td>
                <a class="btn green accent-4" href="{{ route('panel.suggestions.edit', $suggestion->id) }}"><i class="material-icons right">edit</i>Editar</a>
              </td>
              <td>
                {!! Form::open(['route' => ['panel.suggestions.destroy', $suggestion->id], 'method' => 'delete', 'onsubmit' => 'return confirmAction();']) !!}
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
      {!! $suggestions->render() !!}
    @else
      <h3 class="center alert alert-info">No hay sugerencias</h3>
    @endif
  </div>
</div>
@endsection