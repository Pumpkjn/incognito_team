<?php

class Sub
{
	public $sub;
    public function __construct()
    {
        
    }

    function get_all_sub() {
    	global $database;
		$sql = "SELECT * From open_subs";
		$result = $database->select_all_query( $sql );
		return $result;
    }

    function get_sub_by_user( $user_id ) {
    	global $user,$database;
    	$current_user = $user->get_user_by_id( $user_id );
    	$role = $current_user['role'];
    	switch ( $role ) {
    		case 0:
    			$sql = "SELECT * From open_subs";
    			break;
    		default:
    			$department = $user->get_user_department_id( $user_id );
    			$sql = "SELECT * From open_subs WHERE dep_id=".$department['id'];
    			break;
    	}
    	$result = $database->select_all_query( $sql );
    	return $result;

    }


    function delete_sub( $Sub_id ) {
		global $database;
		$sql = 'DELETE FROM open_subs WHERE id = "'.$Sub_id.'"';
		$database->execute_query( $sql );
	}

	function insert_sub( $sub ) {
		global $database;
		$sql = "INSERT INTO open_subs( `title` , `date`, `closure_date`, `status`, `dep_id` )
		VALUES ('" . $sub['title'] . "','".$sub['date']."', '".$sub['closure_date']."', '".$sub['status']."', '".$sub['dep_id']."')";
		$database->execute_query( $sql );
	}

	function get_sub_by_id( $Sub_id ) {
		global $database;
		$sql = "SELECT * From open_subs WHERE id=".$Sub_id;
		$result = $database->select_all_query( $sql );
		return $result[0];
	}

	function get_current_sub() {
		global $database;
		if (session_status() == PHP_SESSION_NONE) {
		    session_start();
		}
		$Sub_id = $_SESSION['id'];
		$sql = "SELECT * From open_subs WHERE id=".$Sub_id;
		$result = $database->select_all_query( $sql );
		return $result[0];
	}

	function get_sub_department( $Sub_id ) {
		global $database;
		$sql = 'SELECT deps.name FROM deps INNER JOIN Subs WHERE Subs.dep_id = deps.id AND Subs.id='.$Sub_id;
		$result = $database->select_all_query( $sql );
		return $result[0];
	}

	function switch_idea_request_status( $sub_id ) {
		global $database;
		$idea_request = $this->get_sub_by_id( $sub_id );
		$status = $idea_request['status'];
		if ( 0 == $status ) {
			$new_status = 1;
		} else {
			$new_status = 0;
		}
		$sql = 'UPDATE open_subs SET status ='.$new_status.' WHERE id='.$sub_id;
		$database->execute_query( $sql );
	}

}
$GLOBALS['sub'] = new Sub();