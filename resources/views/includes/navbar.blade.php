<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
          <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
          <img src="{{ asset('img/logoNAABOL.png') }}" alt="Logo" style="max-width: 100px;">
        </a>
      </div>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="{{ url('/') }}" class="nav-link px-2 {{ request()->is('/') ? 'link-primary' : 'link-secondary' }}">Inicio</a></li>
        @auth
        <li><a href="{{ route('reporte') }}" class="nav-link px-2 {{ request()->is('reporte') ? 'link-primary' : 'link-secondary' }}">Reporte</a></li>
        @endauth
      </ul>

      <div class="col-md-3 text-end">
        <a href="{{ asset('docs/instrucciones_llenado_formulario.pdf') }}" target="_blank" class="btn btn-success btn-sm">Instrucciones de llenado</a>
        @guest
        <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm me-2">Ingresar</a>
        @else
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-primary btn-sm">Salir</button>
        </form>
        @endguest
      </div>
    </header>
  </div>
