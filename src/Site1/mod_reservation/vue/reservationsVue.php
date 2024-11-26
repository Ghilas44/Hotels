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
    
            $this->tpl->display('mod_reservation/vue/reservationsListeVue.tpl');
        }
        
        public function genererAffichageFiche($valeurs, $hotels, $paiementtypes){
            switch ($this->parametre['action']){
                case "form_consulter":
                    $this->tpl->assign('action',value: 'consulter');
    
                    $this->chargementValeurs();
    
                    $this->tpl->assign('readOnly', "disabled");
    
                    $this->tpl->assign('readOnlyTwo', "disabled");
    
                    $this->tpl->assign('titrePage', 'Fiche de réservation : Consultation');
    
                    $this->tpl->assign('reservation', $valeurs);

                    $this->tpl->assign('hotels', $hotels);

                    $this->tpl->assign('paiementtypes', $paiementtypes);
    
                break;
                case "form_ajouter":
                    case "ajouter":
                    $this->tpl->assign('action',value: 'ajouter');
                    $this->chargementValeurs();
    
                    $this->tpl->assign('titrePage', 'Fiche de réservation : Ajout');
    
                    $this->tpl->assign('readOnlyTwo', "");

                    $this->tpl->assign('typebouton', 'btn btn-success');
    
                    $this->tpl->assign('reservation', $valeurs);
                        
                    $this->tpl->assign('hotels', $hotels);

                    $this->tpl->assign('paiementtypes', $paiementtypes);
    
                break;
                case "form_modifier":
                    case "modifier":
                    $this->tpl->assign('action',value: 'modifier');
    
                    $this->chargementValeurs();
    
                    $this->tpl->assign('titrePage', 'Fiche de réservation : Modification');
    
                    $this->tpl->assign('readOnly', "disabled");
    
                    $this->tpl->assign('readOnlyTwo', "");

                    $this->tpl->assign('typebouton', 'btn btn-warning');
    
                    $this->tpl->assign('reservation', $valeurs);

                    $this->tpl->assign('hotels', $hotels);

                    $this->tpl->assign('paiementtypes', $paiementtypes);
    
                break;
                case "form_supprimer":
                    case "supprimer":
                    $this->tpl->assign('action',value: 'supprimer');
    
                    $this->chargementValeurs();
    
                    $this->tpl->assign('titrePage', 'Fiche de réservation : Suppression');
    
                    $this->tpl->assign('readOnly', "disabled");
    
                    $this->tpl->assign('readOnlyTwo', "disabled");

                    $this->tpl->assign('typebouton', 'btn btn-danger');
    
                    $this->tpl->assign('reservation', $valeurs);

                    $this->tpl->assign('hotels', $hotels);

                    $this->tpl->assign('paiementtypes', $paiementtypes);
    
                break;
            }
            $this->tpl->display('mod_reservation/vue/reservationFicheVue.tpl');
        }

    }