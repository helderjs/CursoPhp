<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DefaultController
 *
 * @author Helder
 */
class MainController extends Controller {

    public function index() {
        $post = new PostModel();
        
        if ($post->select(2)) {
            $param = Array(
                'title' => $post->title,
                'text' => $post->text,
            );
        } else {
            $param = array('error' => 'Ocorreu um erro ao carregar registro');
        }
        $this->render('index', $param);
    }
    
    public function remover()
    {
        $post = new PostModel();
        $post->id = 1;
        
        if ($post->delete()) {
            $param = Array(
                'message' => 'Post removido com sucesso'
            );
        } else {
            $param = array('error' => 'Falha ao remover');
        }
        $this->render('remover', $param);
    }

}

?>
