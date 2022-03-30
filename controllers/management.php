<?php
class Management extends Controller {

    //var $models = array('userinformations', 'date', 'address', 'offer', 'company');

    function index(){
        $this->loadModel('Address');
        $this->loadModel('Company');
        $this->loadModel('Date');
        $this->loadModel('Offer');
        $data = array();

        $data['filter'] = array (
            'type' => 'Offers'
        );
        
        if(!isset($_COOKIE['Cookies']) || ($_COOKIE['Cookies'] == false)) {
            header("Location:login");
        }

        
    
        if(!isset($management)){
            $management = array(
                'type' => 'Offers',
                'action' => ''
            );
            $data['management'] = $management; 
            $data['filter']['type'] = "Offers";
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
            var_dump($data['management']['action']);
        }
        
        

        $this->loadModel('userinformations');
        $data['user'] = $this->userinformations->getUserInformation();

        if(!$data['user']['userObject'] instanceof User) {
            header("Location:login");
        }

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

                    $this->Company->create($postal_code, $city, $street_name, $street_number, $company_name, $company_description, $cesi_accept, $company_email, $domains_activity, $is_visible);
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

                    //TODO
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

        
        
        



        
        
        $this->set($data);

        
        
        $this->render('index');
    }
}
?>