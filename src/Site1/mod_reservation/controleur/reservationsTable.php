<?php

class ReservationsTable {
     
    private $ResNo = '';
    private $LastName = '';
    private $FirstName = '';
    private $Description = '';
    private $NameHotel = '';
    private $Hotel = '';
    private $Payment = '';

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

    public function getResNo(){
        return $this->ResNo;
    }
    public function setResNo($ResNo) {
        $this->ResNo = $ResNo;
    }
    public function getLastName(){
        return $this->LastName;
    }
    public function setLastName($LastName) {
        $this->LastName = $LastName;
    }
    public function getFirstName(){
        return $this->FirstName;
    }
    public function setFirstName($FirstName) {
        $this->FirstName = $FirstName;
    }
    public function getDescription(){
        return $this->Description;
    }
    public function setDescription($Description) {
        $this->Description = $Description;
    }
    public function getNameHotel(){
        return $this->NameHotel;
    }
    public function setNameHotel($NameHotel) {
        $this->NameHotel = $NameHotel;
    }

    public function getHotel(){
        return $this->Hotel;
    }
    public function setHotel($Hotel) {
        $this->Hotel = $Hotel;
    }

    public function getPayment(){
        return $this->Hotel;
    }
    public function setPayment($Payment) {
        $this->Payment = $Payment;
    }

}