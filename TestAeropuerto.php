<?php
include_once 'Aeropuerto.php';
include_once 'Aerolinea.php';
include_once 'Vuelo.php';
include_once 'Persona.php';

$aerolinea1 = new Aerolinea("A1", "Aerolínea 1", []);
$aerolinea2 = new Aerolinea("A2", "Aerolínea 2", []);

$personaResponsable = new Persona("Luz", "Pucheta", "Calle 1", "luz@hotmail.com", 46464646);

$vueloA1 = new Vuelo("V1", 1000, new DateTime("2000-01-01"), "Calamuchita", new DateTime("10:00"), new DateTime("08:00"), 100, 50, $personaResponsable);
$vueloA2 = new Vuelo("V2", 1500, new DateTime("2000-02-02"), "China muerta", new DateTime("12:00"), new DateTime("10:00"), 80, 30, $personaResponsable);
$vueloB1 = new Vuelo("V3", 2000, new DateTime("2000-03-03"), "Venado Tuerto", new DateTime("14:00"), new DateTime("12:00"), 120, 60, $personaResponsable);
$vueloB2 = new Vuelo("V4", 2500, new DateTime("2005-10-31"), "Cipocity", new DateTime("16:00"), new DateTime("14:00"), 90, 40, $personaResponsable);

$aerolinea1->incorporarVuelo($vueloA1);
$aerolinea1->incorporarVuelo($vueloA2);

$aerolinea2->incorporarVuelo($vueloB1);
$aerolinea2->incorporarVuelo($vueloB2);

echo "Aerolínea 1:\n";
echo $aerolinea1 . "\n";

echo "Aerolínea 2:\n";
echo $aerolinea2 . "\n";

$aeropuerto = new Aeropuerto("Ezeiza", "Calle 45");
$aeropuerto->setColeccionAerolineas([$aerolinea1, $aerolinea2]);

echo "Aeropuerto:\n";
echo $aeropuerto . "\n";


$cantidadAsientos = 3;
$destino = "Cipocity";
$fecha = new DateTime("2000-10-31");


$vueloAsignado = $aeropuerto->ventaAutomatica($cantidadAsientos, $fecha, $destino);

if ($vueloAsignado !== null) {
    echo "Venta realizada. \n";
    echo $vueloAsignado . "\n";
} else {
    echo "No se pudo realizar la venta.\n";
}

$identificacionAerolinea = "A1"; 
$promedioRecaudado = $aeropuerto->promedioRecaudadoXAerolinea($identificacionAerolinea);

echo "Promedio recaudado por la Aerolínea $identificacionAerolinea: $promedioRecaudado\n";
