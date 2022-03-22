<?php
class UserLogin extends Model {
    
    var $table = 'user';

    function getUserById($id = 1) {
        return $this->find(array(
            'order' => 'NoPil DESC'
        ));
    }

    function loginExist($login) {

        $user = $this->find(array(
            'conditions' => "Login = '$login'",
            'order' => 'Id_User ASC'
        ));

        if($user != false) {
            return $user->Id_User;
        } else {
            return -1;
        }
    }

    function getInfos($login, $pwrd) {
        $id_user = $this->loginExist($login);

        if($id_user == -1) return -1;

        $user = $this->find(array(
            'conditions' => "Login = '$login' AND Password_Login = '$pwrd'",
            'order' => 'Id_User ASC'
        ));
        if($user == false) {
            return -2;
        }

        return $user;
    }
}
?>