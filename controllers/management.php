<?php
class Management extends Controller {

    //var $models = array('userinformations', 'date', 'address', 'offer', 'company');

    function index(){
        $this->loadModel('Address');
        $this->loadModel('Company');
        $this->loadModel('date');
        $this->loadModel('offer');
        $data = array();


        if(!isset($_COOKIE['Cookies']) || ($_COOKIE['Cookies'] == false)) {
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
                    $company_name = $_POST[''];

                    $this->Offer->create($postal_code, $city, $street_name, $street_number, $date, $title_offer, $description_offer, $degree_level_required, $duration, $time_unit, $remuneration, $number_of_places, $offer_link, $company_name);
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
?>