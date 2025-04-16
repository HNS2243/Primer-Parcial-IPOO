<?php
class Aerolinea { //Variables que maneja la clase
    private string $identificacion;
    private string $nombre;
    private array  $coleccionVuelos; // array de objetos Vuelo 

    // Constructor
    public function __construct(string $identificacion, string $nombre, array $coleccionVuelos) {
        $this->setIdentificacion($identificacion);
        $this->setNombre($nombre);
        $this->setVuelosProgramados($coleccionVuelos);
    }

    // Setters para creacion de costrictor o reasignacion 
    public function setIdentificacion($identificacion) {
        $this->identificacion = $identificacion;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setColeccionVuelos($coleccionVuelos) {
        $this->coleccionVuelos = $coleccionVuelos;
    }

    // Getters
    public function getIdentificacion() {
        return $this->identificacion;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getColeccionVuelos() {
        return $this->coleccionVuelos;
    }

    // Método para agregar un vuelo a la colección
    public function agregarVuelo(Vuelo $vuelo) {
        $this->vuelosProgramados[] = $vuelo;
    }
    //toma un _destino y una catidad de _asientos a pedir, tiene que retornar una coleccion de vuelos validos.
    public function darVueloADestino($destino, $cant_asientos){
        $colVuelos = [];
        $colVuelosAerolinea = $this-> getCleccionVuelos();
        foreach ($colVuelosAerolinea as $unObjVuelo){
            $elDestino = $unObjVuelo->getDestino();
            $cant_disponible = $unObjVuelo->getCantAsientosDisponibles();
            if ($elDestino ==$destino && $cant_disponible >= $cant_asientos){
                $colVuelos [] = $unObjVuelo;
            }
        }
        return $colVuelos;
    }
    // tiene que tomar el vuelo que se le proporcina y verificar que no se repita con nungun otro (destino, fechas y horas)
    public function incorporarVuelo($vuelo){
        $posible   = false;
        $comprarD  = $vuelo->getDestino();
        $comprarF  = $vuelo->getFecha();
        $comprarH  = $vuelo->getHoraPartida();
        $auxExiste = false;
                
        $vuelos = $this->getColeccionVuelos();
        foreach ($vuelos as $vueloC){
         $comprarDC = $vueloC->getDestino();
         $comprarFC = $vueloC->getFecha();
         $comprarHC = $vueloC->getHoraPartida();
            if($comprarD == $comprarDC && $comprarF == $comprarFC && $comprarH == $comprarHC){
               $auxExiste = true;  //si hago != no lo toma a menos que todo sea !=
            } 
        }
            if (!$auxExiste) {   //Fuera del foreach
               $tempVuelos = $this->getColeccionVuelos(); 
               $tempVuelos [] =$vuelo;
               $this->setColeccionVuelos($tempVuelos);
               $posible = true;
            }
        
            return $posible;
    }
//Dada una cant de asientos, destino y fecha se busca el primer vuelo que coincida 
public function venerVueloADestino($cant_asientos, $destino, $fecha){
    $vuelos = $this->darVueloADestino($destino, $cant_asientos);
    $i = 0;
    $vueloC = null;
     

    while ($i < count($vuelos) && $vueloC == null) {
        $vueloT = $vuelos[$i];
        if ($vueloT->getFecha() <= $fecha) {
            $vueloC = $vueloT;
        }
        $i++;
    }
    if ($vuelo !== null){
    $vueloC->asignarAsientosDisponibles($cant_asientos);
    }
    return $vueloC;
}
}