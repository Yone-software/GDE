<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
    @isset($doctitle)
    {{$doctitle}} | Gestor de Entrevistas
    @else
    Gestor de Entrevistas
    @endisset
    </title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js" integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/main.css" />
  </head>
  <body>
    <header class="header-bar mb-3">
      <div class="container d-flex flex-column flex-md-row align-items-center p-3">
        <h4 class="my-0 me-md-auto fw-normal"><a href="/" class="text-white text-decoration-none">Gestor de Entrevistas</a></h4>
        
        @auth
        <div class="d-flex align-items-center my-3 my-md-0">
          <p class="text-white me-4 mb-0">Usuario | <strong>{{auth()->user()->username}}</strong></p>
          <a class="btn btn-sm btn-success me-2" href="/crear-cita">Registrar cita</a>
          <form action="/logout" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-sm btn-secondary">Cerrar sesión</button>
          </form>
        </div>     
        @else 
        <form action="/login" method="POST" class="mb-0 pt-2 pt-md-0">
          @csrf
          <div class="row align-items-center">
            <div class="col-md me-0 pe-md-0 mb-3 mb-md-0">
              <input name="loginusername" class="form-control form-control-sm input-dark" type="text" placeholder="Usuario" autocomplete="off" />
            </div>
            <div class="col-md me-0 pe-md-0 mb-3 mb-md-0">
              <input name="loginpassword" class="form-control form-control-sm input-dark" type="password" placeholder="Contraseña" />
            </div>
            <div class="col-md-auto">
              <button class="btn btn-primary btn-sm">Iniciar sesión</button>
            </div>
          </div>
        </form>
        @endauth
        
      </div>
    </header>
    
    <!-- header ends here -->

    @if (session()->has('success'))
    <div class="container container_narrow">
      <div class="alert alert-success text-center">
        {{session('success')}}
      </div>
    </div>
    @endif

    @if (session()->has('failure'))
        <div class="container container_narrow">
          <div class="alert alert-danger text-center">
            {{session('failure')}}
          </div>
        </div>
    @endif
    {{$slot}}

    <!-- footer begins -->
    <footer class="border-top text-center small text-muted py-3">
        <p class="m-0"><a href="/" class="text-muted">Gestor de Entrevistas</a> | Ejercicio</p>
      </footer>
    </body>
  </html>