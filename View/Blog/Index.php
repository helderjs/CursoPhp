<table>
    <thead>
             
    
           
      <tr>
           <td><a style="color:#00ff00;" href ="index.php?c=blog&a=addPost">+<a/></td>
      </tr>
    </thead>
    <tbody>
<?php

       foreach($result as $resul){?>
            <tr>
                <td>
                    <a href ="index.php?c=blog&a=viewPost&id=<?= $resul['id']?>">
                        <img src="<?= APP ?>/images/find.png" width="12px" height="12px">
                    </a>
                    <a href ="index.php?c=blog&a=editPost&id=<?= $resul['id']?>">
                        <img src="<?= APP ?>/images/edit.png" width="12px" height="12px">
                    </a>
                    <a href ="index.php?c=blog&a=deletePost&id=<?= $resul['id']?>">
                        <img src="<?= APP ?>/images/delete.png" width="12px" height="12px">
                    </a>
                </td>
                <td>
                <?= $resul['id']?>
                </td>
                <td>
                <?= $resul['title']?>
                </td>
                <td>
                <?= $resul['created']?>
                </td>
            </tr>
       <?php }?>
 
    </tbody>
    <tfoot></tfoot>
</table>
