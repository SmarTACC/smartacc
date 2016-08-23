<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>SmarTACC</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    {!! Html::style('css/home/style.css', array(), true) !!}
  </head>
  <body>
    @yield('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
    {!! Html::script('js/home/main.js', array(), true) !!}
    @yield('scripts')
  </body>
</html>