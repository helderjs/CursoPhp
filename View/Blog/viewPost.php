<table>
    <thead>
           
      <tr>
           <td><center>Titulo</center></td>
           <td><center>Texto</center></td>
           <td><center>Criacao</center></td>
      </tr>
      
    </thead>
    <tbody>
        <tr>
           <td><?=$title?></td>
           <td><?=$text?></td>
           <td><?=$create?></td>
            
           
      </tr>
      </tody>
    </table>
<table>
    <thead>
           
      <tr>
          <td>
                   <a href ="index.php?c=comment&a=addComment&postId=<?=$id?>">
                        <img src="<?= APP ?>/images/add.png" width="12px" height="12px">
                    </a>
            </td> 
          <td><center>Titulo</center></td>
           
      </tr>
      
    </thead>
    <tbody>
       <?php
             foreach($comments as $comment){?>
        <tr>
            <td>
                   <a href ="index.php?c=blog&a=ViewComment&id=<?= $comment['id']?>">
                        <img src="<?= APP ?>/images/comment.png" width="12px" height="12px">
                    </a>
            </td>
            <td><?= $comment['name']?></td>
            <td><?= $comment['text']?></td>
        </tr>
      <?php }?>
      </tody>
    </table>


   

                   




