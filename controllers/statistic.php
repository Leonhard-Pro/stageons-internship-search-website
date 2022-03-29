<?php
class Statistic extends Controller {

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

    if(!isset($statistic)){
        $statistic = array(
            'type' => 'Offers',
            'action' => ''
        );
        $data['statistic'] = $statistic;
    }

    
    if (isset($_POST["typestatistic"])){
        $statistic['type'] = $_POST["typestatistic"];
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