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

    public function lister(){
        $valeurs = $this->oModele->getListeReservations();
        // var_dump($valeurs);
        // exit;
        $this->oVue->genererAffichageReservations($valeurs);
    }

    public function form_consulter(){

        $valeurs = $this->oModele->getUneReservation();
        $hotels = $this->oModele->getListeHotels();
        $paiementtypes = $this->oModele->getListePaiementtypes();
        var_dump ($paiementtypes);
        exit;
        $this->oVue->genererAffichageFiche($valeurs, $hotels, $paiementtypes);
        
    }

    public function form_modifier(){

        $valeurs = $this->oModele->getUneReservation();

        $hotels = $this->oModele->getListeHotels();

        $paiementtypes = $this->oModele->getListePaiementtypes();

        $this->oVue->genererAffichageFiche($valeurs, $hotels, $paiementtypes);
    }

    public function form_supprimer(){

        $valeurs = $this->oModele->getUneReservation();

        $hotels = $this->oModele->getListeHotels();

        $paiementtypes = $this->oModele->getListePaiementtypes();

        $this->oVue->genererAffichageFiche($valeurs, $hotels, $paiementtypes);

    }

    
    public function form_ajouter(){


        $prepareReservations = new ReservationsTable();
        // $this->oModele->getListeHotels();
        $this->oVue->genererAffichageFiche($prepareReservations);

    }
}