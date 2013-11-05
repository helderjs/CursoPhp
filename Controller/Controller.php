<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author Helder
 */
abstract class Controller {
    //put your code here
    
    protected function render($action, $params = array()){
        $class = str_replace("Controller", '', get_class($this));
        extract($params);
        $path = "/View/{$class}/{$action}.php";
        require($path);
   
    }
    
    public function index(){
        
        $this->render('index');
        
    }
}

?>
