<?php
class Login extends Controller {

    function index(){
        $data = array();
        $data['login'] = array(
            'error' => '',
        );

        if(isset($_POST['email']) && isset($_POST['pwrd'])) {
            $this->loadModel('userlogin');
            $user = $this->userlogin->getInfos($_POST['email'], $_POST['pwrd']);
            $error_code = 0;
            if(!$user instanceof User) {
                $error_code = $user;
            }

            switch ($error_code) {
                case -1:
                    $data['login'] = array(
                        'error' => 'Wrong User Login!',
                    );
                    break;
                
                case -2:
                    $data['login'] = array(
                        'error' => 'Wrong Password!',
                    );
                    break;

                case -3:
                    $data['login'] = array(
                        'error' => 'Can not access to informations from data base',
                    );
                    break;

                default:
                    $debug = (array) $user;
                    header("Location:".$user->getDefaultPage()."");
                    echo "<script>console.log(JSON.parse(JSON.stringify(" . json_encode($debug) . ")));</script>";
                    break;
            }


        }
        
        $this->set($data);

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