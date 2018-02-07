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

    function get_current_user_id() {
    	
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
    	$role = 'Student';
    	switch ( $role_id ) {
    		case 0:
    			$role = 'Admin';
    			break;

    		case 1:
    			$role = 'Manager';
    			break;

    		case 1:
    			$role = 'Student';
    			break;

    		default:
    			$role = 'Student';
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
		if ( !$user['deps'] ) {
			$sql = "INSERT INTO users( `username` , `password`, `name`, `email`, `role` )
			VALUES ('" . $user['email'] . "','".$user['password']."', '".$user['name']."', '".$user['email']."', '".$user['role']."')";
		} else {
			$sql = "INSERT INTO users( `username` , `password`, `name`, `email`, `role`, `dep_id` )
			VALUES ('" . $user['email'] . "','".$user['password']."', '".$user['name']."', '".$user['email']."', '".$user['role']."', '".$user['deps']."')";
		}
		$database->execute_query( $sql );
	}
}
$GLOBALS['user'] = new User();