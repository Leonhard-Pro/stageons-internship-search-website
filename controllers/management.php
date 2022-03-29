<?php
class Management extends Controller {

function index(){
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
    }

    


    $this->loadModel('userinformations');
    $data['user'] = $this->userinformations->getUserInformation();

    if(!$data['user']['userObject'] instanceof User) {
        header("Location:login");
    }
    
    



    
    
    $this->set($data);

    
    
    $this->render('index');
    }
}
?>