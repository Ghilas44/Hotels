<?php

/**
 * Class PaymenttypesTable
 */
class PaymenttypesTable
{
    // 1 déclarer les propriétés (attributs)
    private $Payment = "";
    private $Description = "";
    private $messageErreur = "";

    // 2 importer la méthode hydrater !
    public function hydrater(array $row) {

        foreach ($row as $k => $v) {
            // Concaténation : nom de la méthode setter à appeler
            $setter = 'set' . ucfirst($k);
            // fonction prend 2 paramètres : l'objet en cours et le nom de la méthode
            if (method_exists($this, $setter)) {
                // Invoquer la méthode
                $this->$setter($v);
            }
        }
    }

    // 3 puis  le constructeur !
    public function __construct($data = null) {

        if ($data != null) {

            $this->hydrater($data);
        }
    }


    // 4 ALT + INSER pour générer setter et getter !
    /**
     * @return string
     */
    public function getPayment()
    {
        return $this->Payment;
    }

    public function getMessageErreur(){
        return $this->messageErreur;
    }
    /**
     * @param string $Payment
     */
    public function setPayment($Payment)
    {
        $this->Payment = $Payment;
    }

    public function SetMessageErreur($messageErreur){
        $this->messageErreur .= $messageErreur; // Concatenation avec l'attribut
    }
    
    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @param string $Description
     */
    public function setDescription($Description)
    {
        if (empty($Description) || ctype_space(strval($Description))) {

            $this->SetMessageErreur("La description est obligatoire.");
            // echo $this->messageErreur;
            // exit;
        } else {
            
            $this->Description = $Description;
        }
    }






}
