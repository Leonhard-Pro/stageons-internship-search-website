<?php
class Offers extends Controller {

function index(){
    $data = array();

    if(!isset($_COOKIE['Cookies']) || ($_COOKIE['Cookies'] == false)) {
        header("Location:login");
    }


    $this->loadModel('userinformations');
    $data['user'] = $this->userinformations->getUserInformation();

    if(!$data['user']['userObject'] instanceof User) {
        header("Location:login");
    }

    $data['filter'] = array (
        'type' => 'Offers'
    );
    
    



    
    
    $this->set($data);

    
    
    $this->render('index');
    }
}
?>