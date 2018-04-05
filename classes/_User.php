<?php
class User
{
	public $user;
    public function __construct()
    {
        
    }

	function EncryptPassword($password, $email){
		$usersalt = md5($email); //Create user unique salt
		$encrypted_pass = crypt($password, '$2a$12$'.$usersalt.'$'); //Encrypt password using bCrypt
		return $encrypted_pass;
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
		$password = $user['password'];
		$email = $user['email'];
		$encryptedpass = $this->EncryptPassword($password, $email);

		$sql = "INSERT INTO users( `username` , `password`, `name`, `email`, `role`, `dep_id` )
		VALUES ('" . $user['email'] . "','".$encryptedpass."', '".$user['name']."', '".$user['email']."', '".$user['role']."', '".$user['deps']."')";
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

	function get_manager_of_department( $dep ) {
		global $database;
		$sql = 'SELECT email FROM users WHERE dep_id='.$dep;
		$result = $database->select_all_query( $sql );
		return $result[0];
	}
	function get_current_user_department() {
		$user_data = $this->get_current_user();
		return $user_data['dep_id'];
	}

	function add_user_meta( $id, $key, $value ) {
		global $database;
    	$sql = "INSERT INTO user_meta( `user_id`, `meta_key`, `meta_value`  )
			VALUES ('" . $id . "', '" . $key . "', '" . $value . "')";
		$database->execute_query( $sql );
	}

	function get_user_meta( $id, $key, $plural ) {
		global $database;
    	$sql = 'SELECT * FROM user_meta WHERE user_id='.$id.' AND meta_key="'.$key.'"';
    	$result = $database->select_all_query( $sql );
    	if ( $result ) {
    		if ( $plural ) {
    			foreach ( $result as $res ) {
    				$r[] = $res['meta_value'];
    			}
    		} else {
    			$res = $result[0];
    			$r = $res['meta_value'];
    		}
    		
    	} else {
    		$r = false;
    	}
    	return $r;
	}

	function delete_user_meta( $id, $key ) {
		global $database;
    	$sql = 'DELETE FROM user_meta WHERE user_id = "'.$id.'" AND meta_key ="'.$key.'"';
		$database->execute_query( $sql );
	}

	function block_user( $id ) {
		$this->add_user_meta( $id, 'block' , true );
	}

	function unblock_user( $id ) {
		$this->delete_user_meta( $id, 'block' );
	}

}
$GLOBALS['user'] = new User();