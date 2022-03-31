<?php
class Statistic extends Controller {

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

    if(!isset($statistic)){
        $statistic = array(
            'type' => 'Offers',
            'action' => ''
        );
        $data['statistic'] = $statistic;
    }

    
    if (isset($_POST["typeStat"])){
        $statistic['type'] = $_POST["typeStat"];
        $data['statistic'] = $statistic;
        $data['filter'] = array (
            'type' => $statistic['type']
        );
    }
    




    
    
    $this->set($data);

    
    
    $this->render('index');
    }
}
?>