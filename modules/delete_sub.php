<?php
	require_once("../database.php");
	require_once("../classes/_sub.php");
	require_once("../functions.php");
	session_start();
	global $database,$sub;

	if ( current_user_can_coor() ) {
		$id = isset( $_GET['id'] ) ? $_GET['id'] :null ;
		if ( $id && $id != '' ) {
			$sub->delete_sub( $id );
			header('Location: ../my-idea.php');
			exit();
		} else {
			header('Location: ../my-idea.php?status=error');
			exit();
		}
 	}
?>