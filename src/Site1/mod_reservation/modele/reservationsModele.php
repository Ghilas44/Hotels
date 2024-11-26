<?php

class ReservationsModele extends Modele {
    private $parametre = array();

    function __construct($parametre)
    {
        $this->parametre = $parametre;
    }

    public function getListeReservations(){

        $sql = "SELECT ResNo, LastName, FirstName, Description, Name as NameHotel, reservations.Hotel, reservations.Payment FROM reservations 
        LEFT JOIN paymenttypes on reservations.Payment = paymenttypes.Payment 
        LEFT JOIN hotels on reservations.Hotel = hotels.Hotel ORDER BY ResNo ASC;";
        $resultat = $this->executeRequete($sql);

        if ($resultat->rowCount() > 0) {

            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {

                $listeReservations[] = new ReservationsTable($row);

            }

            return $listeReservations;

        } else {

            return null;
        }
    }

    public function getUneReservation(){
        $sql = "SELECT *, Description, Name as NameHotel FROM reservations 
        INNER JOIN paymenttypes on reservations.Payment = paymenttypes.Payment 
        INNER JOIN hotels on reservations.Hotel = hotels.Hotel
        WHERE ResNo = ?";

        $resultat = $this->executeRequete($sql, array($this->parametre['ResNo']));

        $uneReservation= new ReservationsTable($resultat->fetch(PDO::FETCH_ASSOC));
        // var_dump($uneReservation);
        return $uneReservation;

    }

    public function addReservations(ReservationsTable $valeurs) {
        $sql = "INSERT INTO reservations (LastName, Firstname, Address, City, State, Postal, Phone, Payment, Amount, Hotel, Room, DateIn, DateOut, DateNow) VALUES (?, ?, ?, ?, ?, ?, ?,?,?,?, ?, ?,? , CURRENT_TIME)";
        $idRequete = $this->executeRequete($sql, [
            $valeurs->getDescription(),
        ]);
    }

    public function getListeHotels(){
        $sql = "SELECT * FROM hotels";

        $idRequete = $this->executeRequete($sql); // requête simple

        if ($idRequete->rowCount() > 0) {
            return $idRequete->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }

    public function getListePaiementtypes(){
        $sql = "SELECT * FROM paymenttypes";

        $idRequete = $this->executeRequete($sql); // requête simple

        if ($idRequete->rowCount() > 0) {
            return $idRequete->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }

}