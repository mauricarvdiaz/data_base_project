<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-light navbar-expand-md" style="background-color: #A42f2f;">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Alaya</a>
        <button class="navbar-toggler" data-target="#navcol-1" data-toggle="collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navcol-1" class="collapse navbar-collapse">
          <ul class="nav navbar-nar">
            <li class="nav-item" role="presentation">
              <a class="nav-link" href="#" style="color:#030000">Mi perfil</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" href="#" style="color:#030000">Formalizar idea</a>
            </li>
            <li class="nav-item" role="presentation" style="margin-left:850px;">
              <a class="nav-link" href="#" style="color:#030000">Cerrar sesión</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th style="width:350px;">Retos</th>
            <th style="width:425px;">Publica tu idea</th>
            <th style="">Ideas Publicadas recientemente</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <div class="card">
                <div class="card-header">
                  <h5 class="mb-0">
                    "Reto 1"
                    <input type="checkbox" style="margin-left:170px;" name="" value="">
                  </h5>
                </div>
                <div class="card-body">
                  <p class="card-text">Descripción</p>
                </div>
              </div>
              <div class="card" style="margin-top:5px;">
                <div class="card-header">
                  <h5 class="mb-0">
                    "Reto 2"
                    <input type="checkbox" style="margin-left:170px;" name="" value="">
                  </h5>
                </div>
                <div class="card-body">
                  <p class="card-text">Descripción</p>
                </div>
              </div>
              <div class="card" style="margin-top:5px;">
                <div class="card-header">
                  <h5 class="mb-0">
                    "Reto 3"
                    <input type="checkbox" style="margin-left:170px;" name="" value="">
                  </h5>
                </div>
                <div class="card-body">
                  <p class="card-text">Descripción</p>
                </div>
              </div>
              <div class="form-check" style="margin-top:5px;">
                <input id="formCheck-1" class="form-check-input" type="checkbox" name="" value="">
                <label class="form-check-label" for="formCheck-1">Idea Libre</label>
              </div>
            </td>
            <td style="width:328px">
              <input type="text" placeholder="Titulo idea" style="width:387px;">
              <input type="text" placeholder="Descripción de la idea" style="width:387px;margin-top:3px;height:322px;">
              <button class="btn btn-primary" type="button" style="margin-top:5px; background-color:#a42f2f;margin-left:94px;width:160px;">Publicar</button>
            </td>
            <td>
              <textarea placeholder="Idea 1... Titulo mas Descripción" style="height:115px;width:585px;"></textarea>
              <input type="text" placeholder="Escribe un comentario" style="height:58px;width:456px;margin-top:0px;">
              <button class="btn btn-primary" type="button" style="margin-left:7px;width:102px;height:39px;margin-top:-5px;background-color:#a42f2f">Enviar</button>
              <textarea placeholder="Idea 2... Titulo mas Descripción" style="height:115px;width:585px;margin-top:15px"></textarea>
              <input type="text" placeholder="Escribe un comentario" style="height:58px;width:456px;margin-top:0px;">
              <button class="btn btn-primary" type="button" style="margin-left:7px;width:102px;height:39px;margin-top:-5px;background-color:#a42f2f">Enviar</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
