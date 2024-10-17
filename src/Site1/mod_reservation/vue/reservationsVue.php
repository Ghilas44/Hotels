<?php

    class ReservationsVue {
        private $parametre = array(); //tableau
        private $tpl; // objet smarty
    
    
    
        public function __construct($parametre){
    
            $this->parametre = $parametre;
    
            $this->tpl = new Smarty();
    
        }
    
        private function chargementValeurs() {
    
            $this->tpl->assign('login', 'Ici le nom de la personne identifiée');
    
            $this->tpl->assign('titreVue', 'Les Hôtels');
    
        }
    
    
        public function genererAffichageReservations($valeurs){
    
            $this->chargementValeurs();
    
            $this->tpl->assign('titrePage', 'Liste des réservations');
    
            $this->tpl->assign('listeReservations', $valeurs);
    
            $this->tpl->display('mod_paymenttypes/vue/reservationsListeVue.tpl');
        }
    

    }