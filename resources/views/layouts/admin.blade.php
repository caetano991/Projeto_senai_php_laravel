<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/sass/app.scss' , 'resources/js/app.js'])
    <title>Miguel-Caetano</title>
</head>
<body>
  <header class="text-bg-dark d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <div class="col-md-3 mb-2 mb-md-0">
      <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
        <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap">
          <use xlink:href="#bootstrap"></use>
        </svg>
      </a>
    </div>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <li>
        <a href="{{ route('user.index') }}" class="nav-link px-2 link-secondary">Home</a>
      </li>
      <li>
        <a href="{{ route('user.create') }}" class="nav-link px-2">Cadastrar</a>
      </li>
    </ul>

    <!-- <div class="col-md-3 text-end">
      <button type="button" class="btn btn-outline-primary me-2">Login</button>
    </div> -->

    <div class="col-md-3 text-end">
	    <button href="{{ route('login.destroy') }}" type="button" class="btn btn-outline-primary me-2">Logout</button>
    </div>
</header>

<div class="container">
  @yield('content')
  <div class="nav-link px-4">
         @if (auth()->check())
                Bem vindo, {{ auth()->user()->name }}
         @endif
</div>
</div>
