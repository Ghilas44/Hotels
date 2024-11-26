<?php


class HotelsControleur
{

    private $parametre = array(); //tableau
    private $oModele; // Object
    private $oVue; // Object

    public function __construct($parametre){

        $this->parametre = $parametre;

        $this->oModele = new HotelsModele($parametre);

        $this->oVue = new HotelsVue($parametre);
    }

    public function lister(){

        $valeurs = $this->oModele->getListeHotels();
        exit;
        // $this->oVue->genererAffichageHotels($valeurs);

    }

    // public function form_consulter(){

    //     $valeurs = $this->oModele->getUnPaymenttype();

    //     $this->oVue->genererAffichageFiche($valeurs);
        
    // }

    // public function form_modifier(){

    //     $valeurs = $this->oModele->getUnPaymenttype();
    //     $this->oVue->genererAffichageFiche($valeurs);
    // }

    // public function form_supprimer(){

    //     $valeurs = $this->oModele->getUnPaymenttype();

    //     $this->oVue->genererAffichageFiche($valeurs);


    // }

    
    // public function form_ajouter(){


    //     $preparePaymentType = new HotelsTable();

    //     $this->oVue->genererAffichageFiche($preparePaymentType);

    // }

    // public function ajouter(){

    //     $controlePaymenttype = new HotelsTable($this->parametre);
    //     if (!empty($controlePaymenttype->getMessageErreur())) {
    //         $this->oVue->genererAffichageFiche($controlePaymenttype);
    //     } else {
    //     $this->oModele->addHotels($controlePaymenttype);
    //     $this->lister();
    //     }
    // }

    // public function supprimer(){
    //     $controlePaymenttype = new HotelsTable( $this->parametre);

    //     if (!empty($controlePaymenttype->getMessageErreur())) {
    //         $this->oVue->genererAffichageFiche($controlePaymenttype);
    //     } else {
    //     $this->oModele->deleteHotels($controlePaymenttype);
    //     $this->lister();
    //     }
    // }

    // public function modifier(){
    //     $controlePaymenttype = new HotelsTable($this->parametre);
    //     if (!empty($controlePaymenttype->getMessageErreur())) {
    //         $this->oVue->genererAffichageFiche($controlePaymenttype);
    //     } else {
    //     $this->oModele->updateHotels($controlePaymenttype);
    //     $this->lister();
    //     }
    // }
 
}
