<?php
class Notifications extends Controller {

function index(){
    $data = array();

    if(!isset($_COOKIE['Cookies']) || ($_COOKIE['Cookies'] == false)) {
        header("Location:login");
    }


    $this->loadModel('informations');
    $data['user'] = $this->informations->getUserInformation();

    if(!$data['user']['userObject'] instanceof User) {
        header("Location:login");
    }
    
    



    
    
    $this->set($data);

    
    
    $this->render('index');
    }
}
?>