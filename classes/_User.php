<?php

class User
{
	public $user;
    public function __construct()
    {
        
    }

    function get_all_user() {
    	global $database;
		$sql = "SELECT * From users";
		$result = $database->select_all_query( $sql );
		return $result;
    }

    function check_exist( $email ) {
    	global $database;
		$sql = 'SELECT * From users WHERE email="'.$email.'"';
		$result = $database->select_all_query( $sql );
		if ( $result ) {
			return true;
		} else {
			return false;
		}
    }

    function get_role_text( $role_id ) {
    	$role = 'Staff';
    	switch ( $role_id ) {
    		case 0:
    			$role = 'Admin';
    			break;

    		case 1:
    			$role = 'QA Coordinator';
    			break;

    		case 2:
    			$role = 'Staff';
    			break;

    		default:
    			$role = 'Staff';
    			break;
    	}
    	return $role;
    }

    function delete_user( $user_id ) {
		global $database;
		$sql = 'DELETE FROM users WHERE id = "'.$user_id.'"';
		$database->execute_query( $sql );
	}

	function insert_user( $user ) {
		global $database;
		$sql = "INSERT INTO users( `username` , `password`, `name`, `email`, `role`, `dep_id` )
		VALUES ('" . $user['email'] . "','".$user['password']."', '".$user['name']."', '".$user['email']."', '".$user['role']."', '".$user['deps']."')";
		$database->execute_query( $sql );
	}

	function get_user_by_id( $user_id ) {
		global $database;
		$sql = "SELECT * From users WHERE id=".$user_id;
		$result = $database->select_all_query( $sql );
		return $result[0];
	}

	function get_current_user() {
		global $database;
		if (session_status() == PHP_SESSION_NONE) {
		    session_start();
		}
		$user_id = $_SESSION['id'];
		$sql = "SELECT * From users WHERE id=".$user_id;
		$result = $database->select_all_query( $sql );
		return $result[0];
	}

	function get_current_user_department() {
		$user_data = $this->get_current_user();
		return $user_data['dep_id'];
	}

	function get_user_department( $user_id ) {
		global $database;
		$sql = 'SELECT deps.name FROM deps INNER JOIN users WHERE users.dep_id = deps.id AND users.id='.$user_id;
		$result = $database->select_all_query( $sql );
		return $result[0];
	}

	function get_user_department_id( $user_id ) {
		global $database;
		$sql = 'SELECT deps.id FROM deps INNER JOIN users WHERE users.dep_id = deps.id AND users.id='.$user_id;
		$result = $database->select_all_query( $sql );
		return $result[0];
	}
}
$GLOBALS['user'] = new User();