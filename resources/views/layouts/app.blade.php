  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


      <title>@yield('title')</title>

  </head>

  <body>


      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="container-fluid">
              <a class="navbar-brand" href="/">
                  <i class="fab fa-laravel"></i>
                  Proyecto Web II
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                  aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                  <ul class="navbar-nav">
                      <li class="nav-item">
                          <a class="nav-link" aria-current="page" href="/">Inicio</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="/hospitales">Hospitales</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="/lista/doctores">Doctores</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="/lista/pacientes">Pacientes</a>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>

      @yield('content')

  </body>

  </html>
