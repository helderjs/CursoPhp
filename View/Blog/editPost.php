<form action = "index.php?c=blog&a=editPost&id=<?=$id?>" method="POST">
    
    <input type="hidden" name="id" value="<?=$id?>">
    <label>Titulo</label><br>
        <input type="text" name="title" value="<?=$title?>">
        <br>
    <label>Texto</label><br>
    <textarea rows="10" cols="15" name ="text"><?=$text?></textarea>
    <br>
    <input type="submit" name="enviar">
</form>