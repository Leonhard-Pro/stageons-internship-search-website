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
        $this->render('index');
    }
}
?>