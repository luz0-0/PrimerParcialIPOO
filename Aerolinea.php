
<?php
class Aerolinea {

private string $identificacion;
private string $nombreAerolinea;
private array $vuelosProgramados;

public function __construct(
    string $identificacion, 
    string $nombreAerolinea, 
    array $vuelosProgramados
    ) {
    $this->identificacion = $identificacion;
    $this->nombreAerolinea = $nombreAerolinea;
    $this->vuelosProgramados = [];

}

public function getIdentificacion() {
    return $this->identificacion;
}

public function getNombreAerolinea() {
    return $this->nombreAerolinea;

}

public function getVuelosProgramados() {
    return $this->vuelosProgramados;
}

public function setIdentificacion($identificacion) {
    $this->identificacion = $identificacion;
}

public function setNombreAerolinea($nombreAerolinea) {
    $this->nombreAerolinea = $nombreAerolinea;
}   

public function setVuelosProgramados($vuelosProgramados) {
    $this->vuelosProgramados = $vuelosProgramados;
}


public function darVueloADestino($destino, $asientosLibres) {
        $vuelosDisponibles = [];
        foreach ($this->getVuelosProgramados() as $vuelo) {
            if ($vuelo->getDestino() == $destino && $vuelo->getAsientosDisponibles() >= $asientosLibres) {
                array_push($vuelosDisponibles, $vuelo);
            }
        }
        return $vuelosDisponibles;
    }


    public function incorporarVuelo($nuevoVuelo) {
        $vueloIncorporado = false;
        $vuelosProgramados = $this->getVuelosProgramados();
    
        foreach ($vuelosProgramados as $vuelo) {
            if (
                $vuelo->getDestino() === $nuevoVuelo->getDestino() &&
                $vuelo->getFecha() === $nuevoVuelo->getFecha() &&
                $vuelo->getHoraPartida() === $nuevoVuelo->getHoraPartida()
            ) {
                return false; 
            }
        }
    
        array_push($vuelosProgramados, $nuevoVuelo);
        $this->setVuelosProgramados($vuelosProgramados);
        return true;
    }



    public function venderVueloADestino($asientos, $destino, DateTime $fecha): Vuelo {
        $vueloAsignado = null;
        $cont = 0;
        $vuelosDestino = $this->darVueloADestino($destino, $asientos);
        while ($vueloAsignado == null && $cont < count($vuelosDestino)) {
            if ($vuelosDestino[$cont]->getFecha()->format('d-m-Y') == $fecha->format('d-m-Y')) {
                if ($vuelosDestino[$cont]->asignarAsientosDisponibles($asientos)) {
                    $vueloAsignado = $vuelosDestino[$cont];
                }
            }
            $cont++;
        }
        return $vueloAsignado;
    }


public function montoPromedioRecaudado() {
    
    $vuelosProgramados = $this->getVuelosProgramados();
    $totalRecaudado = 0;
    $cantidadVuelos = count($vuelosProgramados);

    if ($cantidadVuelos === 0) {
        return 0;
    }

    foreach ($vuelosProgramados as $vuelo) {
        $totalRecaudado += ($vuelo->getAsientosTotales() - $vuelo->getAsientosDisponibles()) * $vuelo->getImporte();
    }
    return $totalRecaudado / $cantidadVuelos;
}

public function __toString() {
    $vuelosInfo = "";
    foreach ($this->getVuelosProgramados() as $vuelo) {
        $vuelosInfo .= $vuelo . "\n"; // 
    }

    return 
        "Aerolínea: " . $this->getNombreAerolinea() . "\n" .
        "Identificación: " . $this->getIdentificacion() . "\n" .
        "Vuelos Programados:\n" . $vuelosInfo;
}


}