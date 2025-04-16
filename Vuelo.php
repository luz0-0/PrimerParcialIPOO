<?php

class Vuelo {

private string $numeroVuelo;
private float $importe;
private DateTime $fecha;
private string $destino;
private DateTime $horaArribo;
private DateTime $horaPartida;
private int $asientosTotales;
private int $asientosDisponibles;
private Persona $personaResponsable;

public function __construct(
    string $numeroVuelo, 
    float $importe, 
    DateTime $fecha, 
    string $destino, 
    DateTime $horaArribo, 
    DateTime $horaPartida, 
    int $asientosTotales, 
    int $asientosDisponibles, 
    Persona $personaResponsable
    
    ) {

        $this->numeroVuelo = $numeroVuelo;
        $this->importe = $importe;
        $this->fecha = $fecha;
        $this->destino = $destino;
        $this->horaArribo = $horaArribo;
        $this->horaPartida = $horaPartida;
        $this->asientosTotales = $asientosTotales;
        $this->asientosDisponibles = $asientosDisponibles;
        $this->personaResponsable = $personaResponsable;

}


public function getNumeroVuelo() {
    return $this->numeroVuelo;
}

public function getImporte() {
    return $this->importe;
}

public function getFecha() {
    return $this->fecha;
}

public function getDestino(){
    return $this->destino;
}

public function getHoraArribo(): DateTime {
    return $this->horaArribo;
}

public function getHoraPartida(): DateTime {
    return $this->horaPartida;
}

public function getAsientosTotales() {
    return $this->asientosTotales;
}

public function getAsientosDisponibles() {
    return $this->asientosDisponibles;
}

public function getPersonaResponsable(): Persona {
    return $this->personaResponsable;
}

public function setNumeroVuelo($numeroVuelo) {
    $this->numero = $numeroVuelo;
}

public function setImporte($importe) {
    $this->importe = $importe;
}

public function setFecha(DateTime $fecha) {
    $this->fecha = $fecha;
}

public function setDestino($destino) {
    $this->destino = $destino;
}

public function setHoraArribo(DateTime $horaArribo) {
    $this->horaArribo = $horaArribo;
}

public function setHoraPartida(DateTime $horaPartida){
    $this->horaPartida = $horaPartida;
}

public function setAsientosTotales($asientosTotales){
    $this->asientosTotales = $asientosTotales;
}

public function setAsientosDisponibles($asientosDisponibles) {
    $this->asientosDisponibles = $asientosDisponibles;
}

public function setPersonaResponsable(Persona $personaResponsable) {
    $this->personaResponsable = $personaResponsable;
}


public function asignarAsientosDisponibles($cantPasajeros)
    {
        $disponibilidad= false;
        $asientosDisponibles = $this->getAsientosDisponibles();
        if($asientosDisponibles >= $cantPasajeros){
            $disponibilidad = true;
            $asientosDisponibles -= $cantPasajeros;
            $this->setAsientosDisponibles($asientosDisponibles);
        }
        return $disponibilidad;                
    }


    public function __toString() {
        return 
        "\nINFORMACION VUELO:" .
        "\n Número: " . $this->getNumeroVuelo() .
        "\n Importe: " . $this->getImporte() .
        "\n Fecha: " . $this->getFecha()->format('Y-m-d') . 
        "\n Destino: " . $this->getDestino() .
        "\n Hora arribo: " . $this->getHoraArribo()->format('H:i') . 
        "\n Hora partida: " . $this->getHoraPartida()->format('H:i') . 
        "\n Asientos totales: " . $this->getAsientosTotales() .
        "\n Asientos disponibles: " . $this->getAsientosDisponibles() .
        "\n Persona responsable: " . $this->getPersonaResponsable();
    }
}