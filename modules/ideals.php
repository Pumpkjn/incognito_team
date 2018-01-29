<?php
class ideal
{
    function get_all_ideas_by_category( $cat_id = null ) {
    	global $database;
        $sql = "SELECT * FROM ideas
            JOIN categories_ideas ON ideas.id = categories_ideas.idea_id
            JOIN categories ON categories.id = categories_ideas.category_id";
        if ( $cat_id ) {
          $sql .= " WHERE categories.id =" .$cat_id;
        }
        $result = $database->select_all_query( $sql );
        return $result;
      }
      
}
$GLOBALS['ideal'] = new ideal();