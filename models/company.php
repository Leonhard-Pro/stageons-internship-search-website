<?php
require_once("models/address.php");
require_once("models/date.php");

class Company extends Model {

    //prepare variables needed to user methods from other classes
    var $obj_address;

    function __construct() {
        parent::__construct();
        $this->obj_address = new Address();
    }

    function select(array $data) {
        $attribut = array(" infocompany.Company_Name ", " infocompany.City ", " domain_activity.Domain_Activity ");
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

        $this->table = " (SELECT company.Id_Company, company.Company_Name, company.Company_Description, company.CESI_Trainee_Accept, company.Email_Company, company.Is_Visible, address.Street_Number, address.Street_Name, city.City, postal_code.Postal_Code, domain_activity.Domain_Activity FROM company LEFT JOIN locate_1 ON company.Id_Company = locate_1.Id_Company LEFT JOIN address ON locate_1.Id_Address = address.Id_Address LEFT JOIN city ON address.Id_City = city.Id_City LEFT JOIN postal_code ON city.Id_Postal_Code = postal_code.Id_Postal_Code RIGHT JOIN own_1 ON company.Id_Company = own_1.Id_Company LEFT JOIN domain_activity ON own_1.Id_Domain_Activity = domain_activity.Id_Domain_Activity) as infocompany LEFT JOIN (SELECT company.Id_Company, AVG(score.Score) as scorestudent FROM score RIGHT JOIN student_evaluation ON score.Id_Score = student_evaluation.Id_Score LEFT JOIN company ON company.Id_Company = student_evaluation.Id_Company GROUP BY company.Id_Company) as scorestudents ON infocompany.Id_Company = scorestudents.Id_Company LEFT JOIN (SELECT scorepilot.Id_Company, (AVG( IFNULL(scorepilot.pilotconfidence, scorepilot.delegateconfidence) + IFNULL(scorepilot.delegateconfidence, scorepilot.pilotconfidence ))/2) as scorepilot FROM (SELECT scorepilot.Id_Company, scorepilot.pilotconfidence, scoredelegate.delegateconfidence FROM (SELECT company.Id_Company, AVG(score.Score) as pilotconfidence FROM score RIGHT JOIN pilot_confidence ON score.Id_Score = pilot_confidence.Id_Score LEFT JOIN company ON company.Id_Company = pilot_confidence.Id_Company GROUP BY company.Id_Company) as scorepilot LEFT OUTER JOIN (SELECT company.Id_Company, AVG(score.Score) as delegateconfidence FROM score RIGHT JOIN delegate_confidence ON score.Id_Score = delegate_confidence.Id_Score LEFT JOIN company ON company.Id_Company = delegate_confidence.Id_Company GROUP BY company.Id_Company) as scoredelegate ON scoredelegate.Id_Company = scorepilot.Id_Company UNION ALL SELECT scorepilot.Id_Company, scorepilot.pilotconfidence, scoredelegate.delegateconfidence FROM (SELECT company.Id_Company, AVG(score.Score) as pilotconfidence FROM score RIGHT JOIN pilot_confidence ON score.Id_Score = pilot_confidence.Id_Score LEFT JOIN company ON company.Id_Company = pilot_confidence.Id_Company GROUP BY company.Id_Company) as scorepilot LEFT OUTER JOIN (SELECT company.Id_Company, AVG(score.Score) as delegateconfidence FROM score RIGHT JOIN delegate_confidence ON score.Id_Score = delegate_confidence.Id_Score LEFT JOIN company ON company.Id_Company = delegate_confidence.Id_Company GROUP BY company.Id_Company) as scoredelegate ON scoredelegate.Id_Company = scorepilot.Id_Company WHERE scorepilot.Id_Company IS NULL) as scorepilot) as confidencepilote ON infocompany.Id_Company = confidencepilote.Id_Company ";
        $requete = array(
            'conditions' => $condition,
            'fields' => ' infocompany.Id_Company, infocompany.Company_Name, infocompany.Company_Description, infocompany.CESI_Trainee_Accept, infocompany.Email_Company, infocompany.Is_Visible, infocompany.Street_Number, infocompany.Street_Name, infocompany.City, infocompany.Postal_Code, infocompany.Domain_Activity, scorestudents.scorestudent, confidencepilote.scorepilot ',
            'order' => 'infocompany.Id_Company ASC '
        );
        
        
        return $this->find($requete);
    }

    function addConfidenceRate($score, $company_name, /*$company_email, */$user) {

        //create companys confidence (Pilot)
        if ($user instanceof Pilot) {
            $this->table = 'pilot_confidence';
            $this->createWhereNotExists(array(
                'fields' => 'pilot_confidence.Id_Score, pilot_confidence.Id_Class_Pilot, pilot_confidence.Id_Company',
                'fields_dual' => "(SELECT score.Id_Score FROM score WHERE score.Score = '$score') as id_score, '$user->getId()' as id_pilot, (SELECT company.Id_Company FROM company WHERE company.Company_Name = '$company_name' "/*AND company.Email_Company = '$company_email'*/.") as id_company",
                'conditions' => 'pilot_confidence.Id_Score = temp.id_score AND pilot_confidence.Id_Class_Pilot = temp.id_pilot AND pilot_confidence.Id_Company = temp.id_company'
            ));
        }
        
        //create companys confidence (Delegate)
        if ($user instanceof Delegate) {
            $this->table = 'delegate_confidence';
            $this->createWhereNotExists(array(
                'fields' => 'delegate_confidence.Id_Score, delegate_confidence.Id_Delegate, delegate_confidence.Id_Company',
                'fields_dual' => "(SELECT score.Id_Score FROM score WHERE score.Score = '$score') as id_score, '$user->getId()' as id_delegate, (SELECT company.Id_Company FROM company WHERE company.Company_Name = '$company_name' "/*AND company.Email_Company = '$company_email'*/.") as id_company",
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

    function edit($id_company, $user, $postal_code, $city, $street_name, $street_number, $company_name, $company_description, $cesi_accept = 0, $company_email, array $domains_activity, $score, $is_visible) {
        
        //edit company
        $this->change("UPDATE company SET company.Is_Visible = '$is_visible', company.Company_Name = '$company_name', company.Company_Description = '$company_description', company.CESI_Trainee_Accept = '$cesi_accept', company.Email_Company = '$company_email' WHERE company.Id_Company = '$id_company'");
        
        //delete address
        $this->change("DELETE FROM locate_1 WHERE locate_1.Id_Company = '$id_company'");

        //create address
        $this->obj_address->create($postal_code, $city, $street_name, $street_number);

        //insert address
        $this->change("insert into locate_1 (locate_1.Id_Address, locate_1.Id_Company)	select * from (  select (SELECT address.Id_Address FROM address WHERE address.Street_Number = $street_number AND address.Street_Name = '$street_name') as id_address, (SELECT company.Id_Company FROM company WHERE company.Company_Name = '$company_name') as id_company from dual  ) as temp where not exists (SELECT locate_1.Id_Address, locate_1.Id_Company from locate_1 where locate_1.Id_Address = temp.id_address AND locate_1.Id_Company = temp.id_company)");
    
        //delete domain activity
        $this->change("DELETE FROM own_1 WHERE own_1.Id_Company = '$id_company'");

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

        if ($user instanceof Pilot) {

            //check if exist
            $this->table = 'pilot_confidence';
            $id = $this->find(array(
            'conditions' => "pilot_confidence.Id_Company = '$id_company' AND pilot_confidence.Id_Class_Pilot = '$user->getId()'",
            'fields' => 'pilot_confidence.Id_Class_Pilot',
            'order' => 'Id_Class_Pilot ASC '
            ));

            if(isset($id[0]->Id_Class_Pilot)) {

                //edit note
                $this->change("UPDATE pilot_confidence SET pilot_confidence.Id_Score = (SELECT score.Id_Score WHERE score.Score = '$score' WHERE pilot_confidence.Id_Company = '$id_company' AND pilot_confidence.Id_Class_Pilot = '$user->getId()'");
            }
        }

        if ($user instanceof Delegate) {

            //check if exist
            $this->table = 'delegate_confidence';
            $id = $this->find(array(
            'conditions' => "delegate_confidence.Id_Company = '$id_company' AND delegate_confidence.Id_Delegate = '$user->getId()'",
            'fields' => 'delegate_confidence.Id_Delegate',
            'order' => 'Id_Delegate ASC '
            ));

            if(isset($id[0]->Id_Class_Pilot)) {

                //edit note
                $this->change("UPDATE delegate_confidence SET delegate_confidence.Id_Score = (SELECT score.Id_Score WHERE score.Score = '$score' WHERE delegate_confidence.Id_Company = '$id_company' AND delegate_confidence.Id_Delegate = '$user->getId()'");
            }
        }
    }

    function delete($id_company) {
        $this->change("UPDATE company SET company.Is_Visible = false WHERE company.Id_Company = '$id_company'");
    }
}
?>