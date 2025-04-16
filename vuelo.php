<?php
class Vuelo { //Las variables que maneja la clase:
    private string  $numero;
    private float   $importe;
    private string  $fecha;
    private string  $destino;
    private string  $horaArribo;
    private string  $horaPartida;
    private int     $asientosTotales;
    private int     $asientosDisponibles;
    private Persona $responsable;

    // Constructor
    public function __construct(string $numero, float $importe, string $fecha, string $destino, string $horaArribo, string $horaPartida, int $asientosTotales, int $asientosDisponibles, Persona $responsable) {
        $this->setNumero($numero);
        $this->setImporte($importe);
        $this->setFecha($fecha);
        $this->setDestino($destino);
        $this->setHoraArribo($horaArribo);
        $this->setHoraPartida($horaPartida);
        $this->setAsientosTotales($asientosTotales);
        $this->setAsientosDisponibles($asientosDisponibles);
        $this->setResponsable($responsable);
    }

    // Setters 
    public function setNumero($numero) {
        $this->numero = $numero;
    }
    public function setImporte($importe) {
        $this->importe = $importe;
    }
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }
    public function setDestino($destino) {
        $this->destino = $destino;
    }
    public function setHoraArribo($horaArribo) {
        $this->horaArribo = $horaArribo;
    }
    public function setHoraPartida($horaPartida) {
        $this->horaPartida = $horaPartida;
    }
    public function setAsientosTotales($asientosTotales) {
        $this->asientosTotales = $asientosTotales;
    }
    public function setAsientosDisponibles($asientosDisponibles) {
        $this->asientosDisponibles = $asientosDisponibles;
    }
    public function setResponsable($responsable) {
        $this->responsable = $responsable;
    }

    // Getters
    public function getNumero() {
        return $this->numero;
    }
    public function getImporte() {
        return $this->importe;
    }
    public function getFecha() {
        return $this->fecha;
    }
    public function getDestino() {
        return $this->destino;
    }
    public function getHoraArribo() {
        return $this->horaArribo;
    }
    public function getHoraPartida() {
        return $this->horaPartida;
    }
    public function getAsientosTotales() {
        return $this->asientosTotales;
    }
    public function getAsientosDisponibles() {
        return $this->asientosDisponibles;
    }
    public function getResponsable() {
        return $this->responsable;
    }
//Aca empiezan clases aparte:

//donde $cant_pasajeros es la cantidad de asientos que desean asignarse
//si es necesario, se actualiza la info del vuelo
//retorna True en casdo de concretar y False si no.
public function asignarAsientosDisponibles($cant_pasajeros){
    $respuesta = false;
    $cant_disp = $this->getAsientosDisponibles;
    if ($cant_pasajeros <= $cant_disp){
        $respuesta = true;
         $cant_disp = $cant_disp - $cant_pasajeros;
         $this->setAsientosDisponibles($cant_disp);
    }
    return $respuesta;
}
//asi, se verifica la cantidad de asientos, si es calido, el retorno es T y reasigna la cantidad de asintos disponibles 
}