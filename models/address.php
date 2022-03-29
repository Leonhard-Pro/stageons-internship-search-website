<?php
class Address extends Model {

    function create($postal_code, $city, $street_name, $street_number) {
        
        //create postal code
        $this->table = 'postal_code';
        $this->createWhereNotExists(array(
            'fields' => 'postal_code.Postal_Code',
            'fields_dual' => "'$postal_code' as postalcode",
            'conditions' => 'postal_code.Postal_Code = temp.postalcode'
        ));

        //create city
        $this->table = 'city';
        $this->createWhereNotExists(array(
            'fields' => 'city.City, city.Id_Postal_Code',
            'fields_dual' => "'$city' as city, (SELECT postal_code.Id_Postal_Code FROM postal_code WHERE postal_code.Postal_Code = '$postal_code') as id_postal_code",
            'conditions' => 'city.City = temp.city AND city.Id_Postal_Code = temp.id_postal_code'
        ));

        //create address
        $this->table = 'address';
        $this->createWhereNotExists(array(
            'fields' => 'address.Street_Number, address.Street_Name, address.Id_City',
            'fields_dual' => "$street_number as Street_Number, '$street_name' as Street_Name, (SELECT city.Id_City FROM city WHERE city.City = '$city' AND city.Id_Postal_Code = (SELECT postal_code.Id_Postal_Code FROM postal_code WHERE postal_code.Postal_Code = '$postal_code')) AS city",
            'conditions' => 'address.Street_Number = temp.Street_Number AND address.Street_Name = temp.Street_Name AND address.Id_City = temp.city'
        ));
    }
}
?>