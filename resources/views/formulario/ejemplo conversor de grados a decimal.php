ejemplo conversor de grados a decimal
JAVASCRIPT

// Convertir de grados decimales a grados, minutos y segundos
function decimalADMS(coordenadaDecimal) {
    var grados = Math.floor(coordenadaDecimal);
    var minutosFlotantes = (coordenadaDecimal - grados) * 60;
    var minutos = Math.floor(minutosFlotantes);
    var segundos = (minutosFlotantes - minutos) * 60;
    return [grados, minutos, segundos];
}

// Convertir de grados, minutos y segundos a grados decimales
function DMASADecimal(grados, minutos, segundos) {
    var decimal = grados + minutos / 60 + segundos / 3600;
    return decimal;
}

// Ejemplo de uso
var latitudDecimal = 40.7128;
var longitudDecimal = -74.0060;

var latitudDMS = decimalADMS(latitudDecimal);
var longitudDMS = decimalADMS(longitudDecimal);

console.log("Latitud:", latitudDMS[0], "°", latitudDMS[1], "'", latitudDMS[2], '" N');
console.log("Longitud:", longitudDMS[0], "°", longitudDMS[1], "'", longitudDMS[2], '" W');

// Convertir de grados, minutos y segundos a grados decimales
var latitudDecimal = DMASADecimal(40, 41, 21);
var longitudDecimal = DMASADecimal(74, 2, 40);

console.log("Latitud decimal:", latitudDecimal, "°");
console.log("Longitud decimal:", longitudDecimal, "°");


PHP

<?php
// Convertir de grados decimales a grados, minutos y segundos
function decimalADMS($coordenadaDecimal) {
    $grados = floor($coordenadaDecimal);
    $minutosFlotantes = ($coordenadaDecimal - $grados) * 60;
    $minutos = floor($minutosFlotantes);
    $segundos = ($minutosFlotantes - $minutos) * 60;
    return array($grados, $minutos, $segundos);
}

// Convertir de grados, minutos y segundos a grados decimales
function DMASADecimal($grados, $minutos, $segundos) {
    $decimal = $grados + $minutos / 60 + $segundos / 3600;
    return $decimal;
}

// Ejemplo de uso
$latitudDecimal = 40.7128;
$longitudDecimal = -74.0060;

$latitudDMS = decimalADMS($latitudDecimal);
$longitudDMS = decimalADMS($longitudDecimal);

echo "Latitud: ".$latitudDMS[0]."° ".$latitudDMS[1]."' ".$latitudDMS[2]."\" N\n";
echo "Longitud: ".$longitudDMS[0]."° ".$longitudDMS[1]."' ".$longitudDMS[2]."\" W\n";

// Convertir de grados, minutos y segundos a grados decimales
$latitudDecimal = DMASADecimal(40, 41, 21);
$longitudDecimal = DMASADecimal(74, 2, 40);

echo "Latitud decimal: ".$latitudDecimal."°\n";
echo "Longitud decimal: ".$longitudDecimal."°\n";
?>
