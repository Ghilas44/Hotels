<?php

Class HotelsModele extends Modele{

    private $parametre = array(); //tableau


    function __construct($parametre)
    {

        $this->parametre = $parametre;
    }

    public function getListeHotels(){
        $sql = "SELECT * FROM hotels;";

        $resultat = $this->executeRequete($sql);

        if ($resultat->rowCount() > 0) {

            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {

                $listeHotels[] = new HotelsTable($row);

            }

            return $listeHotels;

        } else {

            return null;
        }

    }

    public function getUnHotel(){
        $sql = "SELECT * 
        FROM hotels
        WHERE Hotel = ?";

        $resultat = $this->executeRequete($sql, array($this->parametre['Hotel']));

        $unHotel= new HotelsTable($resultat->fetch(PDO::FETCH_ASSOC));

        return $unHotel;

    }
}