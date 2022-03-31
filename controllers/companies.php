<?php
class Companies extends Controller {

function index(){
    $data = array();

    if(!isset($_COOKIE['Cookies']) || ($_COOKIE['Cookies'] == false)) {
        header("Location:login");
    }


    $this->loadModel('informations');
    $data['user'] = $this->informations->getUserInformation();

    if(!isset($data['user']['userObject'])) {
        header("Location:login");
    }

    $data['filter'] = array (
        'type' => 'Companies'
    );
    

    if(isset($_POST['Search'])){
        
        if($data['filter']['type'] == "Companies"){
            $filterData = array(
                $_POST['name-company'],
                $_POST['where'],
                $_POST['domain-activity']
            );
        } 
        $this->loadModel('company');
        $data['SelectCompany'] = json_decode(json_encode($this->company->select($filterData)), true);
    }
    else {
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
        } 
        $this->loadModel('company');
        $data['SelectCompany'] = json_decode(json_encode($this->company->select($filterData)), true);
    }
    



    
    
    $this->set($data);

    
    
    $this->render('index');
    }
}
?>