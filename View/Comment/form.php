<form action = "index.php?c=Comment&a=addComment&postId=<?= $postId?>" method="POST">
    <input type="hidden" name="postId" value="<?= $postId?>" >
    <label>Autor</label><br>
        <input type="text" name="name" value="">
        <br>
    <label>Email</label><br>
    <input type="text" name="email" value="">
    <br>
    <label>Texto</label><br>
    <textarea rows="10" cols="15" name ="text"></textarea>
    <br>
    <input type="submit" name="enviar">
</form>
