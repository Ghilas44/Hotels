<?php


class PaymenttypesControleur
{

    private $parametre = array(); //tableau
    private $oModele; // Object
    private $oVue; // Object

    public function __construct($parametre){

        $this->parametre = $parametre;

        $this->oModele = new PaymenttypesModele($parametre);

        $this->oVue = new PaymenttypesVue($parametre);
    }

    public function lister(){

        $valeurs = $this->oModele->getListePaymenttypes();

        $this->oVue->genererAffichagePaymenttypes($valeurs);

    }

    public function form_consulter(){

        $valeurs = $this->oModele->getUnPaymenttype();

        $this->oVue->genererAffichageFiche($valeurs);
        
    }

    public function form_modifier(){

        $valeurs = $this->oModele->getUnPaymenttype();
        $this->oVue->genererAffichageFiche($valeurs);
    }

    public function form_supprimer(){

        $valeurs = $this->oModele->getUnPaymenttype();

        $this->oVue->genererAffichageFiche($valeurs);


    }

    
    public function form_ajouter(){


        $preparePaymentType = new PaymenttypesTable();

        $this->oVue->genererAffichageFiche($preparePaymentType);

    }

    public function ajouter(){

        $controlePaymenttype = new PaymenttypesTable($this->parametre);
        if (!empty($controlePaymenttype->getMessageErreur())) {
            $this->oVue->genererAffichageFiche($controlePaymenttype);
        } else {
        $this->oModele->addPaymenttypes($controlePaymenttype);
        $this->lister();
        }
    }

    public function supprimer(){
        $controlePaymenttype = new PaymenttypesTable( $this->parametre);

        if (!empty($controlePaymenttype->getMessageErreur())) {
            $this->oVue->genererAffichageFiche($controlePaymenttype);
        } else {
        $this->oModele->deletePaymenttypes($controlePaymenttype);
        $this->lister();
        }
    }

    public function modifier(){
        $controlePaymenttype = new PaymenttypesTable($this->parametre);
        if (!empty($controlePaymenttype->getMessageErreur())) {
            $this->oVue->genererAffichageFiche($controlePaymenttype);
        } else {
        $this->oModele->updatePaymenttypes($controlePaymenttype);
        $this->lister();
        }
    }
 
}
