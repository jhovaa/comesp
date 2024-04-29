<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento PDF</title>
    <style>
        @page {
            size: letter;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            position: relative;
            width: 100%;
            height: 100%;
        }
        img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ public_path('docs\FORMATO_COMPROBANTE_VERIFICACION.jpg') }}" alt="" />
        <!-- Etiqueta (label) datos solicitante -->
        <div style="position: absolute;top: 126px;left: 550px;font-size: 12px">{{ $datos->hoja_ruta }}</div>
        <div style="position: absolute;top: 283px;left: 250px;font-size: 12px">{{ $datos->nombre_aerodromo }}</div>
        <div style="position: absolute;top: 303px;left: 250px;font-size: 12px">{{ $datos->nombre_solicitante }}</div>
        <div style="position: absolute;top: 303px;left: 660px;font-size: 12px">{{ $datos->ci }}</div>
        <div style="position: absolute;top: 323px;left: 250px;font-size: 12px">{{ $datos->correo_electronico }}</div>
        <div style="position: absolute;top: 323px;left: 660px;font-size: 12px">{{ $datos->telefono }}</div>
        <div style="position: absolute;top: 341px;left: 250px;font-size: 12px">{{ $datos->departamento }}</div>
        <div style="position: absolute;top: 341px;left: 500px;font-size: 12px">{{ $datos->municipio }}</div>
        <!-- Etiqueta (label) datos coordenadas -->
        <div style="position: absolute;top: 382px;left: 400px;font-size: 12px">{{ $datos->designador_umbral_menor_elevacion }}</div>
        <div style="position: absolute;top: 382px;left: 500px;font-size: 12px">{{ $datos->designador_umbral_mayor_elevacion }}</div>
        <div style="position: absolute;top: 382px;left: 630px;font-size: 12px">{{ $datos->elevacion_aerodromo }}</div>
        <!-- Etiqueta (label) datos coordenadas designador_umbral_menor_elevacion_latitud grados, minutos, segundos -->
        <div style="position: absolute;top: 402px;left: 370px;font-size: 12px">{{ $datos->du_menor_latitud_sur_grados }}</div>
        <div style="position: absolute;top: 402px;left: 405px;font-size: 12px">{{ $datos->du_menor_latitud_sur_minutos }}</div>
        <div style="position: absolute;top: 402px;left: 442px;font-size: 12px">{{ $datos->du_menor_latitud_sur_segundos }}</div>
        <!-- Etiqueta (label) datos coordenadas designador_umbral_menor_elevacion_longitud grados, minutos, segundos -->
        <div style="position: absolute;top: 422px;left: 370px;font-size: 12px">{{ $datos->du_menor_longitud_oeste_grados }}</div>
        <div style="position: absolute;top: 422px;left: 405px;font-size: 12px">{{ $datos->du_menor_longitud_oeste_minutos }}</div>
        <div style="position: absolute;top: 422px;left: 442px;font-size: 12px">{{ $datos->du_menor_longitud_oeste_segundos }}</div>
        <!-- Etiqueta (label) datos coordenadas designador_umbral_mayor_elevacion_latitud grados, minutos, segundos -->
        <div style="position: absolute;top: 402px;left: 490px;font-size: 12px">{{ $datos->du_mayor_latitud_sur_grados }}</div>
        <div style="position: absolute;top: 402px;left: 540px;font-size: 12px">{{ $datos->du_mayor_latitud_sur_minutos }}</div>
        <div style="position: absolute;top: 402px;left: 570px;font-size: 12px">{{ $datos->du_mayor_latitud_sur_segundos }}</div>
        <!-- Etiqueta (label) datos coordenadas designador_umbral_mayor_elevacion_longitud grados, minutos, segundos -->
        <div style="position: absolute;top: 422px;left: 490px;font-size: 12px">{{ $datos->du_mayor_longitud_oeste_grados }}</div>
        <div style="position: absolute;top: 422px;left: 540px;font-size: 12px">{{ $datos->du_mayor_longitud_oeste_minutos }}</div>
        <div style="position: absolute;top: 422px;left: 570px;font-size: 12px">{{ $datos->du_mayor_longitud_oeste_segundos }}</div>
        <!-- Etiqueta (label) datos coordenadas elevacion_aerodromo_latitud grados, minutos, segundos -->
        <div style="position: absolute;top: 402px;left: 615px;font-size: 12px">{{ $datos->ea_latitud_sur_grados }}</div>
        <div style="position: absolute;top: 402px;left: 660px;font-size: 12px">{{ $datos->ea_latitud_sur_minutos }}</div>
        <div style="position: absolute;top: 402px;left: 710px;font-size: 12px">{{ $datos->ea_latitud_sur_segundos }}</div>
        <!-- Etiqueta (label) datos coordenadas elevacion_aerodromo_longitud grados, minutos, segundos -->
        <div style="position: absolute;top: 422px;left: 615px;font-size: 12px">{{ $datos->ea_longitud_oeste_grados }}</div>
        <div style="position: absolute;top: 422px;left: 660px;font-size: 12px">{{ $datos->ea_longitud_oeste_minutos }}</div>
        <div style="position: absolute;top: 422px;left: 710px;font-size: 12px">{{ $datos->ea_longitud_oeste_segundos }}</div>
    </div>
</body>
</html>
