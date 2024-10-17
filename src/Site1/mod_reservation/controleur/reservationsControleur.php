<?php
Class ReservationsControleur{

    private $parametre = [];
    private $oVue ; //Objet
    private $oModele ; //Objet
    
    public function __construct($parametre){

        $this->parametre =$parametre;

        $this->oModele = new ReservationsModele($this->parametre);

        $this->oVue = new ReservationsVue($this->parametre);
    }

    public function liste(){
        $valeurs = $this->oModele->getListeReservations();
        
        $this->oVue->genererAffichageReservations( $valeurs);
    }

}