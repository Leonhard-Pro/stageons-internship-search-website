<?php

class AdvancementModel extends Model
{


    function __construct()
    {
        parent::__construct();
    }

    function selectoffers(array $data)
    {
        $condition ="";
        if ($data['status'] == "") {
            $condition = " Id_Student = " . $data['Id_Student'] . "";
        }
        else {
            $condition =" Id_Student = " . $data['Id_Student'] . " AND  Status ='".$data['status']."'";
        }

        $this->table = " * ";
        $requete = array(
            'conditions' => $condition,
            'fields' => ' offer LEFT JOIN company ON offer.Id_Company = company.Id_Company LEFT JOIN address ON address.Id_Address = offer.Id_Address LEFT JOIN city ON city.Id_City = address.Id_City LEFT JOIN postal_code ON city.Id_Postal_Code = postal_code.Id_Postal_Code LEFT JOIN date ON offer.Id_Date = date.Id_Date RIGHT JOIN have_3 ON have_3.Id_Offer = offer.Id_Offer LEFT JOIN skill ON skill.Id_Skill = have_3.Id_Skill RIGHT JOIN postulate_1 ON offer.Id_Offer = postulate_1.Id_Offer LEFT JOIN status ON postulate_1.Id_Status = status.Id_Status  ',
            'order' => ' Id_Offer ASC '
        );

        return $this->find($requete);
    }

}
