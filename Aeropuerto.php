<?php
class Aeropuerto {
private string $denominacion;
private string $direccion;
private array $coleccionAerolineas;

public function __construct($denominacion, $direccion) {
    $this->denominacion = $denominacion;
    $this->direccion = $direccion;
    $this->coleccionAerolineas = [];

}

public function getDenominacion() {
    return $this->denominacion;
}

public function getDireccion() {
    return $this->direccion;
}

public function getColeccionAerolineas() {
    return $this->coleccionAerolineas;
}

public function setDenominacion($denominacion) {
    $this->denominacion = $denominacion;
}

public function setDireccion($direccion) {
    $this->direccion = $direccion;
}

public function setColeccionAerolineas($coleccionAerolineas) {
    $this->coleccionAerolineas = $coleccionAerolineas;
}


public function retornarVuelosAerolinea($aerolinea) {
    $vuelos = [];
    foreach ($this->coleccionAerolineas as $aero) {
        if ($aero === $aerolinea) {
            foreach ($aero->getVuelos() as $vuelo) {
                $vuelos[] = $vuelo;
            }
        }
    }
    return $vuelos;
}

public function ventaAutomatica(int $asientos, DateTime $fecha, string $destino): ?Vuelo {
    $vueloDisponible = null;
    $colAerolineas = $this->getColeccionAerolineas();
    $totalAerolineas = count($colAerolineas);
    $cont = 0;

    while ($vueloDisponible == null && $cont < $totalAerolineas) {
        $vuelosAerolinea = $colAerolineas[$cont]->darVueloADestino($destino, $asientos);
        if (!empty($vuelosAerolinea)) {
            $vueloDisponible = $colAerolineas[$cont]->venderVueloADestino($asientos, $destino, $fecha);
        }
        $cont++;
    }

    return $vueloDisponible;
}

public function promedioRecaudadoXAerolinea($identificacion) {
    $promedio = 0;
    $colAerolineas = $this->getColeccionAerolineas();
    $cont = 0;

    while ($cont < count($colAerolineas) && $promedio == 0) {
        if ($colAerolineas[$cont]->getIdentificacion() == $identificacion) {
            $promedio = $colAerolineas[$cont]->montoPromedioRecaudado();
        }
        $cont++;
    }

    return $promedio;
}


public function __toString() {
    return 
    "\n INFORMACION AEROPUERTO:".
    "\n Denominación: ".$this->getDenominacion().
    "\n Dirección: ".$this->getDireccion().
    "\n Coleccion aerolineas: ".implode(", ", $this->getcoleccionAerolineas()).
    "\n";
}


}
