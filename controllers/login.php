<?php
class Login extends Controller {

    //var $models = array('UserLogin');

    function index() {
        //$d = array();
        ///////////////$this->loadModel('UserLogin');
        /*$d['login'] = array(
            'titre' => 'Veuillez entrer votre login',
            'description' => 'Exemple de description'
        );*/
        //$d['login'] = $this->UserLogin->getUserById();
        //$this->set($d);
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