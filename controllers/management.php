<?php
class Management extends Controller {

    var $models = array('userinformations');

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

        $data['user'] = $this->userinformations->getUserInformation();

            
        $this->loadModel('address');
        //echo "<script>console.log(JSON.parse(JSON.stringify(" . json_encode() . ")));</script>";

        if(!$data['user']['userObject'] instanceof User) {
            header("Location:login");
        }
        
        



        
        
        $this->set($data);

        
        
        $this->render('index');
    }
}
?>