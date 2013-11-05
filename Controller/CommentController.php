<?php

class CommentController extends Controller {
    
    public function addComment(){
        $comment = new CommentModel();
        $postId = $_GET['postId'];
        $param = Array(
                'postId' => $postId,
        ); 
        if(isset($_POST["name"]) && isset($_POST["text"]) && 
           isset($_POST["email"]) && isset($_GET["postId"])){
            $comment->name = $_POST["name"];
            $comment->text = $_POST["text"];
            $comment->email = $_POST["email"];
            $comment->post_id = $_POST['postId'];
            $result = $comment->insert();
            if($result){
                header("location: index.php?c=blog&a=viewPost&id={$postId}");             
            } else {
                echo "erro";
            }
        }       
        
        $this->render('form', $param);
    }
}
?>
