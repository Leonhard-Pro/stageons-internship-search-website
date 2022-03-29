<?php
class Company extends Model {

    //prepare variables needed to user methods from other classes
    var $obj_address;

    function __construct() {
        parent::__construct();
        $this->obj_address = new Address();
    }

    function addConfidenceRate($score, $company_name, $company_email, $user) {

        //create companys confidence (Pilot)
        if ($user instanceof Pilot) {
            $this->table = 'pilot_confidence';
            $this->createWhereNotExists(array(
                'fields' => 'pilot_confidence.Id_Score, pilot_confidence.Id_Class_Pilot, pilot_confidence.Id_Company',
                'fields_dual' => "(SELECT score.Id_Score FROM score WHERE score.Score = '$score') as id_score, '$user->getId()' as id_pilot, (SELECT company.Id_Company FROM company WHERE company.Company_Name = '$company_name' AND company.Email_Company = '$company_email') as id_company",
                'conditions' => 'pilot_confidence.Id_Score = temp.id_score AND pilot_confidence.Id_Class_Pilot = temp.id_pilot AND pilot_confidence.Id_Company = temp.id_company'
            ));
        }
        
        //create companys confidence (Delegate)
        if ($user instanceof Delegate) {
            $this->table = 'delegate_confidence';
            $this->createWhereNotExists(array(
                'fields' => 'delegate_confidence.Id_Score, delegate_confidence.Id_Delegate, delegate_confidence.Id_Company',
                'fields_dual' => "(SELECT score.Id_Score FROM score WHERE score.Score = '$score') as id_score, '$user->getId()' as id_delegate, (SELECT company.Id_Company FROM company WHERE company.Company_Name = '$company_name' AND company.Email_Company = '$company_email') as id_company",
                'conditions' => 'delegate_confidence.Id_Score = temp.id_score AND delegate_confidence.Id_Delegate = temp.id_delegate AND delegate_confidence.Id_Company = temp.id_company'
            ));
        }
    }

    function create($postal_code, $city, $street_name, $street_number, $company_name, $company_description, $cesi_accept = 0, $company_email, array $domains_activity, $is_visible = true) {

        //create address
        $this->obj_address->create($postal_code, $city, $street_name, $street_number);

        //create company characteristics
        $this->table = 'company';
        $this->createWhereNotExists(array(
            'fields' => 'company.Company_Name, company.Company_Description, company.CESI_Trainee_Accept, company.Email_Company, company.Is_Visible',
            'fields_dual' => "'$company_name' as name, '$company_description' as description, $cesi_accept as cesiaccept, '$company_email' as email, $is_visible as visible",
            'conditions' => 'company.Company_Name = temp.name AND company.Email_Company = temp.email'
        ));

        //include companys location
        $this->table = 'locate_1';
        $this->createWhereNotExists(array(
            'fields' => 'locate_1.Id_Address, locate_1.Id_Company',
            'fields_dual' => "(SELECT address.Id_Address FROM address WHERE address.Street_Number = $street_number AND address.Street_Name = '$street_name') as id_address, (SELECT company.Id_Company FROM company WHERE company.Company_Name = '$company_name') as id_company",
            'conditions' => 'locate_1.Id_Address = temp.id_address AND locate_1.Id_Company = temp.id_company'
        ));

        foreach ($domains_activity as $domain_activity) {
        
            //create domains activity
            $this->table = 'domain_activity';
            $this->createWhereNotExists(array(
                'fields' => 'domain_activity.Domain_Activity',
                'fields_dual' => "'$domain_activity' as domainActivity",
                'conditions' => 'domain_activity.Domain_Activity = temp.domainActivity'
            ));

            //include companys domains activity
            $this->table = 'own_1';
            $this->createWhereNotExists(array(
                'fields' => 'own_1.Id_Domain_Activity, own_1.Id_Company',
                'fields_dual' => "(SELECT domain_activity.Id_Domain_Activity FROM domain_activity WHERE domain_activity.Domain_Activity = '$domain_activity') as id_domainactivity, (SELECT company.Id_Company FROM company WHERE company.Company_Name = '$company_name' AND company.Email_Company = '$company_email') as id_company",
                'conditions' => 'own_1.Id_Domain_Activity=temp.id_domainactivity AND own_1.Id_Company=temp.id_company'
            ));
        }
    }
}
?>