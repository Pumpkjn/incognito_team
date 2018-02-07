<?php
	function admin_get_active_tab( $current, $tab ) {
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
?>