<?php
class Offer extends Model {

    //prepare variables needed to user methods from other classes
    var $obj_address;
    var $obj_date;

    function __construct() {
        $this->obj_address = new Address();
        $this->obj_date = new Date();
    }

    function get($login = 1) {
        //TODO
    }

    function create($postal_code, $city, $street_name, $street_number, $date, $title_offer, $description_offer, $degree_level_required, $duration, $time_unit, $remuneration, $number_of_places, $offer_link, $company_name, $visible_offer = true) {

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
    }
}
