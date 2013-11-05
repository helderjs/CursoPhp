<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of Post
 *
 * @author Helder
 */
class PostController extends Controller{
    
    public function index() {
        //echo "Post Index";
        //include "/View/Post/index.php";
        $this->render('index');
    }
    
    public function add() {
        echo "Post add action";
    }
}

?>
