@if ($errors->any())
  <div class="errors">
    <h5>El formulario contiene errores</h5>
    <ul>
      @foreach ($errors->all() as $error)
        <li><h6>{{ $error }}</h6></li>
      @endforeach
    </ul>
  </div>
@endif