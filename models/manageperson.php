<?php
class ManagePerson extends Model {

    function create($login, $password, $name, $first_name, $email, $id_authorization){

        //create user
        $this->table = 'user';
        $this->createWhereNotExists(array(
            'fields' => 'user.Login, user.Password_Login, user.Id_Authorization',
            'fields_dual' => "'$login' as login, '$password' as pwd_login, $id_authorization as id_authorizations",
            'conditions' => 'user.Login = temp.login AND user.Password_Login = temp.pwd_login AND user.Id_Authorization = temp.id_authorizations'
        ));

        //create person
        $this->table = 'person';
        $this->createWhereNotExists(array(
            'fields' => 'person.Person_Name, person.Person_First_Name, person.Person_Email, person.Id_User',
            'fields_dual' => "'$name' as name, '$first_name' as first_name, '$email' as email, (SELECT user.Id_User FROM user LEFT JOIN authorization ON user.Id_Authorization = authorization.Id_Authorization WHERE user.Login = '$login' AND user.Password_Login = '$password') as id_user",
            'conditions' => 'person.Person_Name = temp.name AND person.Person_First_Name = temp.first_name AND person.Person_Email = temp.email AND person.Id_User = temp.id_user'
        ));
    }
}
?>