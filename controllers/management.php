<?php
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


        if(!isset($_COOKIE['Cookies']) || ($_COOKIE['Cookies'] == false)) {
            header("Location:login");
        }

        if(!isset($management)){
            $management = array(
                'type' => 'Offers',
                'action' => ''
            );
            isset($_POST['Create']) ? $management['type'] = $_POST['Create'] : 0;
            $data['management'] = $management;
        }
        
        if (isset($_POST["typeManagement"])){
            $management['type'] = $_POST["typeManagement"];
            $management['action'] = "";
            $data['management'] = $management;

            //Show companies
            //$companies = $this->Company->getAll();
        }
        
        if (isset($_POST["actionManagement"])){
            $management['action'] = $_POST["actionManagement"];
            $data['management'] = $management;
        }

        $this->loadModel('userinformations');
        $data['user'] = $this->userinformations->getUserInformation();

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
                        $class = explode(" - ", $class);
                        $this->ManagePilot->create($login, $password, $name, $first_name, $email, $center, $class);

                    } else {
                        $authorizations = '1';
                        for ($i = 2; $i < 36; $i++)
                            $authorizations .= isset($_POST['SFx'.$i]) ? 1 : 0;
                        
                        $this->ManageDelegate->create($login, $password, $name, $first_name, $email, $center, $authorizations);
                    }
                    break;
            }
        }

        if(!$data['user']['userObject'] instanceof User) {
            header("Location:login");
        }
        
        



        
        
        $this->set($data);

        
        
        $this->render('index');
    }
}
