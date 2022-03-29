<?php
class Management extends Controller {

    //var $models = array('userinformations', 'date', 'address', 'offer', 'company');

    function index(){
        $data = array();

        $data['filter'] = array (
            'type' => 'Offers'
        );


        if(!isset($_COOKIE['Cookies']) || ($_COOKIE['Cookies'] == false)) {
            header("Location:login");
        }

        if(!$data['user']['userObject'] instanceof User) {
            header("Location:login");
        }

        if(!isset($management)){
            $management = array(
                'type' => 'Offers',
                'action' => ''
            );
            $data['management'] = $management;
        }
        
        if (isset($_POST["typeManagement"])){
            $management['type'] = $_POST["typeManagement"];
            $management['action'] = "";
            $data['management'] = $management;
            $data['filter'] = array (
                'type' => $management['type']
            );
        }
        
        if (isset($_POST["actionManagement"])){
            $management['action'] = $_POST["actionManagement"];
            $data['management'] = $management;
            $data['filter'] = array (
                'type' => ""
            );

        }

        $this->loadModel('userinformations');
        $data['user'] = $this->userinformations->getUserInformation();

        if(isset($_POST['Create'])) {
            switch ($_POST['Create']) {
                case 'Companies':

                    $this->loadModel('Address');
                    $this->loadModel('Company');

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
                $this->loadModel('company');
                $data['SelectCompany'] = json_decode(json_encode($this->company->select($filterData)), true);
            }

            if($data['filter']['type'] == "Pilot"){
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
                $this->loadModel('pilot');
                $data['SelectPilot'] = json_decode(json_encode($this->pilot->select($filterData)), true);
            }

            if($data['filter']['type'] == "Delegate"){
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
                $this->loadModel('delegate');
                $data['SelectDelegate'] = json_decode(json_encode($this->delegate->select($filterData)), true);
            }

            if($data['filter']['type'] == "Student"){
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
                $this->loadModel('student');
                $data['SelectStudent'] = json_decode(json_encode($this->student->select($filterData)), true);
            }
            
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
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    ""
                );
                $this->loadModel('company');
                $data['SelectCompany'] = json_decode(json_encode($this->offer->select($filterData)), true);
            }
            if($data['filter']['type'] == "Pilot"){
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
                $this->loadModel('pilot');
                $data['SelectPilot'] = json_decode(json_encode($this->pilot->select($filterData)), true);
            } 
            if($data['filter']['type'] == "Delegate"){
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
                $this->loadModel('delegate');
                $data['SelectDelegate'] = json_decode(json_encode($this->delegate->select($filterData)), true);
            } 
            if($data['filter']['type'] == "Student"){
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
                $this->loadModel('student');
                $data['SelectStudent'] = json_decode(json_encode($this->student->select($filterData)), true);
            }  
            
        }

        
        
        



        
        
        $this->set($data);

        
        
        $this->render('index');
    }
}
?>