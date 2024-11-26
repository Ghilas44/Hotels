<?php

class HotelsTable {
    
    private $Hotel ="";
    private $Name = '';
    private $Stars = '';

    public function hydrater(array $row) {

        foreach ($row as $k => $v) {
            // Concaténation : nom de la méthode setter à appeler
            $setter = 'set' . ucfirst($k);
            // fonction prend 2 paramètres : l'objet en cours et le nom de la méthode
            if (method_exists($this, $setter)) {
                // Invoquer la méthode
                $this->$setter($v);
            }
        }
    }

    public function __construct($data = null) {

        if ($data != null) {

            $this->hydrater($data);
        }
    }
    // Getters
    public function getHotel(){
        return $this->Hotel;
    }

    public function getName(){
        return $this->Name;
    }

    public function getStars(){
        return $this->Stars;
    }
    
    //Setters 
    public function setHotel($Hotel){
        $this->Hotel = $Hotel;
    }
    
    public function setName($Name){
        $this->Name = $Name;
    }

    public function setStars($Stars){
        $this->Stars = $Stars;
    }
}