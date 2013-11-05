<?php

class CommentModel extends Model {
    
    protected $tableName = 'comments';
    protected $columns = array(
                    'id' => '',
                    'email' => '',
                    'name' => '',
                    'text' => '',
                    'post_id' => '',
                );
    protected $primaryKey = 'id'; 
}

?>
