<?php
	function admin_get_active_tab( $current, $tab ) {
		$current = isset( $current) ? $current : 'dashboard';
		if ( $current == $tab ) {
			return 'active';
		} else {
			return;
		}
	}
?>