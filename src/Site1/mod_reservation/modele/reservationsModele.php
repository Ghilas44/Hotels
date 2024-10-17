<?php

class ReservationsModele extends Modele {
    private $parametre = array();

    function __construct($parametre)
    {
        $this->parametre = $parametre;
    }

    public function getListeReservations(){

        $sql = "SELECT * FROM reservations";
        $resultat = $this->executeRequete($sql);
    }
}