<?php


class UserController  extends Controller{
    
    public function auth(){
        if(!empty($_POST["login"]) && !empty($_POST["password"])){
            $user = new UserModel();
            if($user->login($_POST["login"], $_POST["password"])){
                $location = $_COOKIE['refer'];
                header("location: {$location}");
            }
        }
        $this->render("login");
    }
    
    public function logout() {
        session_start();
        unset($_SESSION['userId']);
        unset($_SESSION['userName']);
        session_destroy();
        
        header("location: index.php?");
    }
}

?>
