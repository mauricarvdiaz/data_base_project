<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>DBD | @yield('titulo')</title>
  <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
</head>
<body>
  @include("layouts.barraSuperior")
  <div class="container-fluid">
    <div class="row">
      <div class="col-10">
          @yield("buscador")
      </div>
      <div class="col">
        <div class="card" style="width: 12rem;">
          <div class="card-body">
            <h5 class="card-title">$ @yield('monto')</h5>
            <p class="card-text">@yield('personas')</p>
            <a href="#" class="btn btn-primary">Reservar</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
