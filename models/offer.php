<?php
require("models/address.php");
require("models/date.php");

class Offer extends Model {

    //var $table = 'user';
    //prepare variables needed to user methods from other classes
    var $obj_address;
    var $obj_date;

    function __construct() {
        parent::__construct();
        $this->obj_address = new Address();
        $this->obj_date = new Date();
    }

    function get($login = 1) {
        //TODO
    }

    function select(array $data) {
        $attribut = array(" offer.Title ", " city.City ", " skill.Skill ", " company.Company_Name ", " offer.Duration ", " offer.Duration_Type ", " offer.Remuneration ", " date.Date ", " offer.Number_Of_Places ", " offer.Degree_Level_Required ");
        $firstloop = true;
        $condition = "";

        for ($i = 0; $i < sizeof($data); $i++){
            if ($data[$i] != "") {
                if ($firstloop)
                {
                    $condition = $condition . $attribut[$i]." LIKE '".$data[$i]."%'";
                    $firstloop =! $firstloop;
                }
                else {
                    $condition = $condition . " AND " . $attribut[$i]." LIKE '".$data[$i]."%'";
                }
            }
        }
        if ($condition == ""){
            $condition = " 1=1 ";
        }

        $this->table = " offer LEFT JOIN company ON offer.Id_Company = company.Id_Company LEFT JOIN address ON address.Id_Address = offer.Id_Address LEFT JOIN city ON city.Id_City = address.Id_City LEFT JOIN postal_code ON city.Id_Postal_Code = postal_code.Id_Postal_Code LEFT JOIN date ON offer.Id_Date = date.Id_Date RIGHT JOIN have_3 ON have_3.Id_Offer = offer.Id_Offer LEFT JOIN skill ON skill.Id_Skill = have_3.Id_Skill ";
        $requete = array(
            'conditions' => $condition,
            'fields' => ' offer.Id_Offer, offer.Title, offer.Description, offer.Degree_Level_Required, offer.Number_Of_Places, offer.Duration, offer.Duration_Type, offer.Remuneration, offer.Link_Offer, offer.visible, company.Company_Name, address.Street_Number, address.Street_Name, city.City, postal_code.Postal_Code, date.Date, skill.Skill  ',
            'order' => ' Id_Offer ASC '
        );
        
        return $this->find($requete);
    }

    function create($postal_code, $city, $street_name, $street_number, $date, $title_offer, $description_offer, $degree_level_required, $duration, $time_unit, $remuneration, $number_of_places, $offer_link, $visible_offer, $company_name) {

        //create address
        $this->obj_address->create($postal_code, $city, $street_name, $street_number);

        //create date
        $this->obj_date->create($date);

        //create offer
        $this->table = 'offer';
        $this->createWhereNotExists(array(
            'fields' => 'offer.Title, offer.Description, offer.Degree_Level_Required, offer.Duration, offer.Duration_Type, offer.Remuneration, offer.Number_Of_Places, offer.Link_Offer, offer.visible, offer.Id_Address, offer.Id_Company, offer.Id_Date',
            'fields_dual' => "'$title_offer' as title, '$description_offer' as description, '$degree_level_required' as degree, '$duration' as duration, '$time_unit' as duration_type, '$remuneration' as remuneration, '$number_of_places' as numberplaces, '$offer_link' as link, '$visible_offer' as visible, (SELECT address.Id_Address FROM address LEFT JOIN city ON address.Id_City = city.Id_City LEFT JOIN postal_code ON postal_code.Id_Postal_Code = city.Id_Postal_Code WHERE address.Street_Number = $street_number AND address.Street_Name = '$street_name' AND city.City = '$city' AND postal_code.Postal_Code = '$postal_code') as id_address, (SELECT company.Id_Company FROM company WHERE company.name = '$company_name') as id_company, (SELECT date.Id_Date FROM date WHERE date.Date = '$date') as id_date",
            'conditions' => 'offer.Title = temp.title AND offer.Description = temp.description AND  offer.Degree_Level_Required = temp.degree AND offer.Duration = temp.duration AND offer.Duration_Type = temp.duration_type AND offer.Remuneration = temp.remuneration AND offer.Number_Of_Places = temp.numberOfPlaces AND offer.Link_Offer = temp.link  AND offer.Id_Address = temp.id_address AND offer.Id_Company = temp.id_company AND offer.Id_Date = temp.id_date AND offer.visible = temp.visible'
        ));

        return true;
    }
}
