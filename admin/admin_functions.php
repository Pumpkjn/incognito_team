<?php
	require_once("../classes/_deps.php");
	require_once("../classes/_Ideas.php");
	require_once("../classes/_user.php");
	function admin_get_active_tab( $current, $tab="" ) {
		$current = isset( $current) ? $current : 'dashboard';
		if ( $current == $tab ) {
			return 'active';
		} else {
			return;
		}
	}

	function check_exist_email( $email ) {
		var_dump("expression");
		die();
	}

	function is_user_login() {
		if (session_status() == PHP_SESSION_NONE) {
		    session_start();
		}
		$login = isset( $_SESSION['login'] ) ? $_SESSION['login'] : null;
		if ( $login ) {
			return true;
		} else {
			return false;
		}
	}

	function current_user_can_manage() {
		if (session_status() == PHP_SESSION_NONE) {
		    session_start();
		}
		global $user;
		$role = $_SESSION['role'];
		$can = false;
		switch ( $role ) {
			case 0:
				$can = true;
				break;

			case 1:
				$can = false;
				break;

			case 2:
				$can = false;
				break;
			
			default:
				$can = false;
				break;
		}
		return $can;
	}
?>