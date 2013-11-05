<?php

class UserModel extends Model {

    protected $tableName = 'users';
    protected $columns = array(
        'id' => '',
        'login' => '',
        'password' => '',
        'name' => '',
    );
    protected $primaryKey = 'id';

    public function login($login, $password) {
        $resul = $this->select(array('login' => $login, 'password' => $password));
        
        if (!empty($resul)) {
            session_start();
            $_SESSION["userId"] = $resul['id'];
            $_SESSION["userName"] = $resul['name'];

            return true;
        }

        return false;
    }

    public static function isLogged() {
        session_start();
        
        if (!empty($_SESSION["userId"])) {
            return true;
        }
        
        setcookie('refer', $_SERVER['REQUEST_URI']);
        return false;
    }

}

?>
