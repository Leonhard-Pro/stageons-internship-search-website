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
    
    



    
    
    $this->set($data);

    
    
    $this->render('index');
    }
}
?>