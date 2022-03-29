<?php
class Management extends Controller {

    //var $models = array('userinformations', 'date', 'address', 'offer', 'company');

    function index(){
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

        if(!$data['user']['userObject'] instanceof User) {
            header("Location:login");
        }
        
        



        
        
        $this->set($data);

        
        
        $this->render('index');
    }
}
?>