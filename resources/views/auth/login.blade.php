<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VERIFICACIÓN DE COMPATIBILIDAD DE ESPACIO AÉREO - INGRESAR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
</head>
<body>
    <div class="container text-center py-4">
        <img src="{{ asset('img/logoNAABOL.png') }}" alt="Logo" style="max-width: 200px; height: auto;">
    </div>
    <form class="form-inline mx-auto" style="width: 330px;" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group mx-sm-3">
            <label for="email" class="sr-only">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
        </div>
        <div class="form-group mx-sm-3">
            <label for="password" class="sr-only">CONTRASEÑA</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100 py-2">INGRESAR</button>
        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
    <!-- Aquí van tus scripts JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
