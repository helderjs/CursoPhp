<?php

class BlogController extends Controller {

    public function index() {
        $post = new PostModel();
        $result = $post->selectAll();

        $this->render('index', array('result' => $result));
    }

    public function addPost() {
        if (!UserModel::isLogged()) {
            header("location: index.php?c=user&a=auth");
        }
        
        $post = new PostModel();
        if (isset($_POST["title"]) && isset($_POST["text"])) {
            $post->title = $_POST["title"];
            $post->text = $_POST["text"];
            $post->created = date("Y-m-d h:i:s");
            $result = $post->insert();
            if ($result) {
                header("location: index.php?c=blog&a=index");
            }
        }
        $this->render('form');
    }

    public function viewPost() {

        $post = new PostModel();
        $post->id = $_GET['id'];
        $post->select();
        $param = Array(
            'id' => $post->id,
            'title' => $post->title,
            'text' => $post->text,
            'create' => $post->created,
        );
        $comment = new CommentModel();
        $comments = $comment->selectAll(array('post_id' => $post->id));
        $param["comments"] = $comments;
        $this->render('viewPost', $param);
    }

    public function deletePost() {
        if (!UserModel::isLogged()) {
            header("location: index.php?c=user&a=auth");
        } else {
            $post = new PostModel();
            $id = $_GET['id'];
            $post->id = $id;

            if ($post->delete()) {
                header("location: index.php?c=blog&a=index");
            }
        }
    }

    public function editPost() {
        if (!UserModel::isLogged()) {
            header("location: index.php?c=user&a=auth");
        }
        
        $post = new PostModel();
        $id = $_GET['id'];
        $post->id = $id;
        $post->select();
        $param = Array(
            'id' => $post->id,
            'title' => $post->title,
            'text' => $post->text,
            'create' => $post->created,
        );
        if (isset($_POST["title"]) && isset($_POST["text"])) {
            $post->id = $_POST["id"];
            $post->title = $_POST["title"];
            $post->text = $_POST["text"];
            $post->created = date("Y-m-d h:i:s");
            $result = $post->update();
            if ($result) {
                header("location: index.php?c=blog&a=index");
            } else {
                echo"Deu Erro";
            }
        }
        $this->render('editPost', $param);
    }

}

?>
