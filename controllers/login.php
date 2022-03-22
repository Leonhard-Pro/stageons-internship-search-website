<?php
class Login extends Controller {

    var $models = array('UserLogin');

    function index() {
        //$d = array();
        ///////////////$this->loadModel('UserLogin');
        /*$d['login'] = array(
            'titre' => 'Veuillez entrer votre login',
            'description' => 'Exemple de description'
        );*/
        //$d['login'] = $this->UserLogin->getUserById();
        //$this->set($d);
        if(isset($this->data['email'])) {
            $id_user = $this->UserLogin->loginExist($this->data['email']);

            if($id_user !== -1 && isset($this->data['pwrd'])) {
                $user = $this->UserLogin->getInfos($this->data['email'], $this->data['pwrd']);
                if($user === -2) {
                    echo "<script>console.log('Wrong Password');</script>";
                }
                echo "<script>console.log('result: " . json_encode($user) . "');</script>";
            } else {
                echo "<script>console.log('Wrong User Login');</script>";
            }
        }

        
        
        if(!isset($_COOKIE['Cookies'])) {
            setcookie('Cookies', false, time()+ (60*60*24*365.25), '/', false, false);
        }

        if (isset($_POST["accept-cookies"])){
	        setcookie('Cookies', true, time()+ (60*60*24*365.25), '/', false, false);
	        header("Location:login");
	        exit;
        }

        $this->render('index');
    }
}
?>