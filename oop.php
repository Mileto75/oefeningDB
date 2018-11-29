<?php
/**
 * Created by PhpStorm.
 * User: mileto.di.marco
 * Date: 5/10/2018
 * Time: 13:51
 */

include '../includes/header.php';





class Boek
{
    //klasseattributen van ons datatype boek
    private $titel;
    private $aut_id;
    private $boek_id;
    private $cat_id;
    private $uitg_id;


    //Constructor functie wordt aangeroepen teleksn er een object aangemaakt wordt
    public function __construct($aut_id,$boek_id,$uitg_id,$titel,$cat_id)
    {
        //de interne variabelen/attributen worden gevuld met de waarden die
        //meegeleverd worden vanuit het programma
        $this->aut_id   = $aut_id;
        $this->uitg_id  = $uitg_id;
        $this->boek_id  = $boek_id;
        $this->cat_id   = $cat_id;
        $this->titel    = $titel;
    }



    //get en set methodes
    //deze functie retourneert de waarde van aut_id, maar enkel als die gevuld is
    public function getAutId()
    {
        if(isset($this->aut_id))
        {
            return $this->aut_id;
        }
        else
        {
            return "waarde leeg!";
        }
    }


    /**
     * @param mixed $aut_id
     */
    public function setAutId($aut_id)
    {
        //ons auteur_id moet een positief geheel getal zijn
        if(is_numeric($aut_id) && is_int($aut_id) && $aut_id > 0)
        {
            $this->aut_id = $aut_id;
        }
        else
        {
            echo "aut_id moet een positief getal zijn!";
        }

    }

}

$mijnBoek = new Boek(2,4,5,"Hoge bomen",5);



$mijnBoek->setAutId(23);
echo $mijnBoek->getAutId();
include '../includes/footer.php';