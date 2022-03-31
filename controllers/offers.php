<?php
class Offers extends Controller {

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

    $data['filter'] = array (
        'type' => 'Offers'
    );
    

    if(isset($_POST['Search'])){
        
        if($data['filter']['type'] == "Offers"){
            $filterData = array(
                $_POST['what'],
                $_POST['where'],
                $_POST['skill'],
                $_POST['name-company'],
                $_POST['duration'],
                $_POST['type-duration'],
                $_POST['remuneration'],
                $_POST['date-published'],
                $_POST['numberplaces'],
                $_POST['degree']
            );
        } 
        $this->loadModel('offer');
        $data['SelectOffer'] = json_decode(json_encode($this->offer->select($filterData)), true);
    }
    else {
        if($data['filter']['type'] == "Offers"){
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
        $this->loadModel('offer');
        $data['SelectOffer'] = json_decode(json_encode($this->offer->select($filterData)), true);
    }
    



    
    
    $this->set($data);

    
    
    $this->render('index');
    }
}
?>