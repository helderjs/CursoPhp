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
class PostModel extends Model{
    
    protected $tableName = 'posts';
    protected $columns = array(
        'id' => '',
        'title' => '',
        'text' => '',
        'created' => '',
    );
    protected $primaryKey = 'id';
}

?>
