<?php

require_once('models/convertStringToBinaryArray.php');

class Management extends Controller {

    //var $models = array('userinformations', 'date', 'address', 'offer', 'company');

    function index(){
        $this->loadModel('Address');
        $this->loadModel('Company');
        $this->loadModel('Date');
        $this->loadModel('Offer');
        $this->loadModel('ManagePerson');
        $this->loadModel('School');
        $this->loadModel('Classes');
        $this->loadModel('ManageStudent');
        $this->loadModel('ManagePilot');
        $this->loadModel('ManageDelegate');
        $data = array();

        $data['filter'] = array (
            'type' => 'Offers'
        );
        $data['offerInformations'] = "";
        
        if(!isset($_COOKIE['Cookies']) || ($_COOKIE['Cookies'] == false)) {
            header("Location:login");
        }

        
    
        if(!isset($management)){
            $management = array(
                'type' => 'Offers',
                'action' => ''
            );
            $data['filter']['type'] = "Offers";
            isset($_POST['Create']) ? $management['type'] = $_POST['Create'] : 0;
            $data['management'] = $management;
            
        }
        
        
        if (isset($_POST["typeManagement"])){
            $management['type'] = $_POST["typeManagement"];
            $management['action'] = "";
            $data['management'] = $management;
            $data['filter'] = array (
                'type' => $management['type']
            );
            unset($_POST["typeManagement"]);
        }
        
        if(isset($_POST['type'])){
            $data['management'] = array(
                'type' => $_POST['type'],
                'action' => ''
            );
            $data['filter'] = array (
                'type' => $_POST['type']
            );
            unset($_POST['type']);
        }
        
        if (isset($_POST["actionManagement"])){
            $management['action'] = $_POST["actionManagement"];
            $data['management'] = $management;
            $data['filter'] = array (
                'type' => ""
            );
            unset($_POST["actionManagement"]);
        }

        $this->loadModel('informations');
        $data['user'] = $this->informations->getUserInformation();

        //To send the information of the offer to the update form
        if ($management['action'] == "Update"){
            $i = $_POST["update-id-informations"];
            $data['offerInformations'] = $this->informations->getInformationById($i);
            if ($management['type'] == "Delegate"){
                $data['authorizations'] = convertStringToBinaryArray($data['offerInformations']['Authorization_Code']);
            }
            unset($_POST['update-id-informations']);
        }
        
        

        

        if(!isset($data['user']['userObject'])) {
            header("Location:login");
        }

        //create entities
        if(isset($_POST['Create'])) {
            switch ($_POST['Create']) {
                case 'Companies':

                    $postal_code = $_POST['adrss_postal_code'];
                    $city = $_POST['adrss_city'];
                    $street_name = $_POST['adrss_street_name'];
                    $street_number = $_POST['adrss_number'];
                    $company_name = $_POST['name'];
                    $company_description = $_POST['description'];
                    $cesi_accept = $_POST['committed_intern'];
                    $cesi_accept == null ? $cesi_accept = 0 : 0;
                    $company_email = $_POST['email'];
                    isset($_POST['visible']) ? $is_visible = true : $is_visible = false;
                    $domains_activity = explode(" - ", $_POST['domain_activity']);
                    $score = $_POST['grade'];
                    $score == 'None' ? $score = null : 0;

                    $this->Company->create($postal_code, $city, $street_name, $street_number, $company_name, $company_description, $cesi_accept, $company_email, $domains_activity, $is_visible);
                    $this->Company->addConfidenceRate($score, $company_name, /*$company_email, */$data['user']['userObject']);
                    break;

                case 'Offers':

                    $title_offer = $_POST['title'];
                    $time_unit = $_POST['time_unit'];
                    $skills = explode(" - ", $_POST['skills']);
                    $remuneration = $_POST['remuneration'];
                    $date = $_POST['publish_date'];
                    $number_of_places = $_POST['posts_number'];
                    $offer_link = $_POST['link'];
                    $degree_level_required = $_POST['grade'];
                    $duration = $_POST['duration'];
                    $description_offer = $_POST['description'];
                    $street_name = $_POST['adrss_street_name'];
                    $city = $_POST['adrss_city'];
                    $postal_code = $_POST['adrss_postal_code'];
                    $street_number = $_POST['adrss_number'];
                    $company_name = $_POST['company_name'];

                    $this->Offer->create($postal_code, $city, $street_name, $street_number, $date, $title_offer, $description_offer, $degree_level_required, $duration, $time_unit, $remuneration, $number_of_places, $offer_link, $company_name, $skills);
                    break;

                case 'Student':
                case 'Pilot':
                case 'Delegate':

                    $login = $_POST['login'];
                    $password = $_POST['password'];
                    $name = $_POST['name'];
                    $first_name = $_POST['first_name'];
                    $email = $_POST['email'];
                    $center = $_POST['center'];
                    isset($_POST['class']) ? $class = $_POST['class'] : 0;
                    
                    if($_POST['Create'] == 'Student') {
                        $this->ManageStudent->create($login, $password, $name, $first_name, $email, $center, $class);

                    } elseif($_POST['Create'] == 'Pilot') {
                        $classes = explode(" - ", $class);
                        $this->ManagePilot->create($login, $password, $name, $first_name, $email, $center, $classes);

                    } else {
                        $authorizations = '1';
                        for ($i = 2; $i < 36; $i++)
                            $authorizations .= isset($_POST['SFx'.$i]) ? 1 : 0;
                        
                        $this->ManageDelegate->create($login, $password, $name, $first_name, $email, $center, $authorizations);
                    }
                    break;
            }
        }

        //edit entities
        if(isset($_POST['Update'])) {
            switch ($_POST['Update']) {
                case 'Companies':

                    $postal_code = $_POST['adrss_postal_code'];
                    $city = $_POST['adrss_city'];
                    $street_name = $_POST['adrss_street_name'];
                    $street_number = $_POST['adrss_number'];
                    $company_name = $_POST['name'];
                    $company_description = $_POST['description'];
                    $cesi_accept = $_POST['committed_intern'];
                    $cesi_accept == null ? $cesi_accept = 0 : 0;
                    $company_email = $_POST['email'];
                    isset($_POST['visible']) ? $is_visible = true : $is_visible = false;
                    $domains_activity = explode(" - ", $_POST['domain_activity']);
                    $score = $_POST['grade'];
                    $score == 'None' ? $score = null : 0;

                    $id_company = $_POST['id'];

                    $this->Company->edit($id_company, $data['user']['userObject'], $postal_code, $city, $street_name, $street_number, $company_name, $company_description, $cesi_accept, $company_email, $domains_activity, $score);
                    break;

                case 'Offers':

                    $title_offer = $_POST['title'];
                    $time_unit = $_POST['time_unit'];
                    $skills = explode(" - ", $_POST['skills']);
                    $remuneration = $_POST['remuneration'];
                    $date = $_POST['publish_date'];
                    $number_of_places = $_POST['posts_number'];
                    $offer_link = $_POST['link'];
                    $degree_level_required = $_POST['grade'];
                    $duration = $_POST['duration'];
                    $description_offer = $_POST['description'];
                    $street_name = $_POST['adrss_street_name'];
                    $city = $_POST['adrss_city'];
                    $postal_code = $_POST['adrss_postal_code'];
                    $street_number = $_POST['adrss_number'];
                    $company_name = $_POST['company_name'];

                    $id_offer = $_POST['id'];

                    $this->Offer->edit($id_offer, $postal_code, $city, $street_name, $street_number, $date, $title_offer, $description_offer, $degree_level_required, $duration, $time_unit, $remuneration, $number_of_places, $offer_link, $company_name, $skills);
                    break;

                case 'Student':
                case 'Pilot':
                case 'Delegate':

                    $login = $_POST['login'];
                    $password = $_POST['password'];
                    $name = $_POST['name'];
                    $first_name = $_POST['first_name'];
                    $email = $_POST['email'];
                    $center = $_POST['center'];
                    isset($_POST['class']) ? $class = $_POST['class'] : 0;
                    $id_type = $_POST['id'];
                    
                    if($_POST['Update'] == 'Student') {
                        $this->ManageStudent->edit($id_type, $login, $password, $name, $first_name, $email, $center, $class);

                    } elseif($_POST['Update'] == 'Pilot') {
                        $classes = explode(" - ", $class);
                        $this->ManagePilot->edit($id_type, $login, $password, $name, $first_name, $email, $center, $classes);

                    } else {
                        $authorizations = '1';
                        for ($i = 2; $i < 36; $i++)
                            $authorizations .= isset($_POST['SFx'.$i]) ? 1 : 0;
                        
                        $this->ManageDelegate->edit($id_type, $login, $password, $name, $first_name, $email, $center, $authorizations);
                    }
                    break;
            }
        }

        
        if(isset($_POST['Search'])){
            if($data['filter']['type'] == "Offers"){
                $filterData = array(
                    $_POST['what'],
                    $_POST['where'],
                    $_POST['skill'],
                    $_POST['name-company'],
                    $_POST['duration'],
                    $_POST['type-duration'],
                    $_POST['remuneration'],
                    $_POST['date-published'],
                    $_POST['numberplaces'],
                    $_POST['degree']
                );
                $this->loadModel('offer');
                $data['SelectOffer'] = json_decode(json_encode($this->offer->select($filterData)), true);
            }
            
            if($data['filter']['type'] == "Companies"){
                $filterData = array(
                    $_POST['name-company'],
                    $_POST['where'],
                    $_POST['domain-activity']
                    //$_POST[''] Faire le rate
                );
                $this->loadModel('company');
                $data['SelectCompany'] = json_decode(json_encode($this->company->select($filterData)), true);
            }

            if($data['filter']['type'] == "Pilot"){
                $filterData = array(
                    $_POST['name'],
                    $_POST['first-name'],
                    $_POST['school'],
                    $_POST['class']
                );
                $this->loadModel('managepilot');
                $data['SelectPilot'] = json_decode(json_encode($this->managepilot->select($filterData)), true);
            }

            if($data['filter']['type'] == "Delegate"){
                $filterData = array(
                    $_POST['name'],
                    $_POST['first-name'],
                    $_POST['school']
                );
                $this->loadModel('managedelegate');
                $data['SelectDelegate'] = json_decode(json_encode($this->managedelegate->select($filterData)), true);
            }

            if($data['filter']['type'] == "Student"){
                $filterData = array(
                    $_POST['name'],
                    $_POST['first-name'],
                    $_POST['school'],
                    $_POST['class']
                );
                $this->loadModel('managestudent');
                $data['SelectStudent'] = json_decode(json_encode($this->managestudent->select($filterData)), true);
            }
            unset($_POST['Search']);
        }
        else {
            if($data['filter']['type'] == "Offers"){
                $filterData = array(
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    ""
                );
                $this->loadModel('offer');
                $data['SelectOffer'] = json_decode(json_encode($this->offer->select($filterData)), true);
            } 
            if($data['filter']['type'] == "Companies"){
                $filterData = array(
                    "",
                    "",
                    ""
                    //$_POST[''] Faire le rate
                );
                $this->loadModel('company');
                $data['SelectCompany'] = json_decode(json_encode($this->company->select($filterData)), true);
            }
            if($data['filter']['type'] == "Pilot"){
                $filterData = array(
                    "",
                    "",
                    "",
                    ""
                );
                $this->loadModel('managepilot');
                $data['SelectPilot'] = json_decode(json_encode($this->managepilot->select($filterData)), true);
            } 
            if($data['filter']['type'] == "Delegate"){
                $filterData = array(
                    "",
                    "",
                    ""
                );
                $this->loadModel('managedelegate');
                $data['SelectDelegate'] = json_decode(json_encode($this->managedelegate->select($filterData)), true);
            } 
            if($data['filter']['type'] == "Student"){
                $filterData = array(
                    "",
                    "",
                    "",
                    ""
                );
                $this->loadModel('managestudent');
                $data['SelectStudent'] = json_decode(json_encode($this->managestudent->select($filterData)), true);
            }
            
        }

        if(isset($data['filter']['type'])){
            $dataSwitch = $data['filter']['type'];
            switch($dataSwitch) {
                case "Offers":
                    $_SESSION['informationOffer'] = $data['SelectOffer'];
                    break;

                case "Companies":
                    $_SESSION['informationOffer'] = $data['SelectCompany'];
                    break;

                case "Student":
                    $_SESSION['informationOffer'] = $data['SelectStudent'];
                    break;

                case "Pilot":
                    $_SESSION['informationOffer'] = $data['SelectPilot'];
                    break;

                case "Delegate":
                    $_SESSION['informationOffer'] = $data['SelectDelegate'];
                    break;
                
                default:
                    break;
            }
        }

        
        
        



        
        
        $this->set($data);

        
        
        $this->render('index');
    }
}
?>