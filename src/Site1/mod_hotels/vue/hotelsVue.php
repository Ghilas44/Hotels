<?php


class HotelsVue
{

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


    public function genererAffichageHotels($valeurs){

        $this->chargementValeurs();

        $this->tpl->assign('titrePage', 'Liste des types de paiements');

        $this->tpl->assign('listeHotels', $valeurs);

        $this->tpl->display('mod_Hotels/vue/HotelsListeVue.tpl');
    }

    public function genererAffichageFiche($valeurs){
        switch ($this->parametre['action']){
            case "form_consulter":
                $this->tpl->assign('action',value: 'consulter');

                $this->chargementValeurs();

                $this->tpl->assign('readOnly', "disabled");

                $this->tpl->assign('readOnlyTwo', "disabled");

                $this->tpl->assign('titrePage', 'Fiche Type de Paiement : Consultation');

                $this->tpl->assign('unPaiementtype', $valeurs);

            break;
            case "form_ajouter":
                case "ajouter":
                $this->tpl->assign('action',value: 'ajouter');
                $this->chargementValeurs();

                $this->tpl->assign('titrePage', 'Fiche Type de Paiement : Ajout');

                $this->tpl->assign('readOnlyTwo', "");

                $this->tpl->assign('typebouton', 'btn btn-success');

                $this->tpl->assign('unPaiementtype', $valeurs);

            break;
            case "form_modifier":
                case "modifier":
                $this->tpl->assign('action',value: 'modifier');

                $this->chargementValeurs();

                $this->tpl->assign('titrePage', 'Fiche Type de Paiement : Modification');

                $this->tpl->assign('readOnly', "disabled");

                $this->tpl->assign('readOnlyTwo', "");

                $this->tpl->assign('typebouton', 'btn btn-warning');

                $this->tpl->assign('unPaiementtype', $valeurs);

            break;
            case "form_supprimer":
                case "supprimer":
                $this->tpl->assign('action',value: 'supprimer');

                $this->chargementValeurs();

                $this->tpl->assign('titrePage', 'Fiche Type de Paiement : Suppression');

                $this->tpl->assign('readOnly', "disabled");

                $this->tpl->assign('readOnlyTwo', "disabled");

                $this->tpl->assign('typebouton', 'btn btn-danger');

                $this->tpl->assign('unPaiementtype', $valeurs);

            break;
        }
        $this->tpl->display('mod_Hotels/vue/HotelsFicheVue.tpl');
    }
}
