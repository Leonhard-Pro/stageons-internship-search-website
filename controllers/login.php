<?php
class Login extends Controller {

    var $models = array('UserLogin');

    function index() {
        $ph = array();
        $ph['login'] = array(
            'error' => '',
        );
        $this->set($ph);
        ///////////////$this->loadModel('UserLogin');
        /*$d['login'] = array(
            'titre' => 'Veuillez entrer votre login',
            'description' => 'Exemple de description'
        );*/
        //$d['login'] = $this->UserLogin->getUserById();
        //$this->set($d);
        if(isset($this->data['email']) && isset($this->data['pwrd'])) {
            $user = $this->UserLogin->getInfos($this->data['email'], $this->data['pwrd']);
            $error_code = 0;
            if(!$user instanceof Administrator) {
                $error_code = $user;
            }

            switch ($error_code) {
                case -1:
                    $ph['login'] = array(
                        'error' => 'Wrong User Login!',
                    );
                    break;
                
                case -2:
                    $ph['login'] = array(
                        'error' => 'Wrong Password!',
                    );
                    break;

                case -3:
                    $ph['login'] = array(
                        'error' => 'Can not access to informations from data base',
                    );
                    break;

                default:
                    $debug = (array) $user;
                    echo "<script>console.log(JSON.parse(JSON.stringify(" . json_encode($debug) . ")));</script>";
                    //header("Location:offers");
                    break;
            }
            $this->set($ph);
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