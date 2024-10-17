<?php
class Reservations
{
    private $parametre = [];
    private $oControleur; //

    public function __construct($parametre){

        $this->parametre = $parametre;

        $this->oControleur = new ReservationsControleur($this->parametre);

    }

    public function choixAction(){

        $this->oControleur->liste();

    }
}