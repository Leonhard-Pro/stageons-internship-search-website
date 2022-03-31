<?php
class Advancement extends Controller {

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
            'type' => 'Student'
        );

        if(!isset($advancement)){
            $advancement = array(
                'type' => 'Wishlist',
                'action' => ''
            );
            $data['advancement'] = $advancement;
            
        }

        if (isset($_POST["typeAdvancement"])){
            $advancement['type'] = $_POST["typeAdvancement"];
            $advancement['action'] = "";
            $data['advancement'] = $advancement;
            $data['filter'] = array (
                'type' => $advancement['type']
            );
            unset($_POST["typeAdvancement"]);
        }

        if (isset($_POST["actionAdvancement"])){
            $advancement['action'] = $_POST["actionAdvancement"];
            $data['advancement'] = $advancement;
            $data['filter'] = array (
                'type' => ""
            );
            unset($_POST["actionAdvancement"]);
        }

        
        



        
        
        $this->set($data);

        
        
        $this->render('index');
    }
}
?>