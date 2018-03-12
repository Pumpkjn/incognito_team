<?php
	require_once("../database.php");
	require_once("../classes/_ideas.php");
	require_once("../functions.php");
	session_start();
	global $database,$idea;

	if ( current_user_can_coor() ) {

		$id = isset( $_GET['id'] ) ? $_GET['id'] :null ;
		if ( $id && $id != '' ) {
			$idea->delete_idea( $id );
			header('Location: ../my-idea.php');
			exit();
		} else {
			header('Location: ../my-idea.php?status=error');
			exit();
		}
 	}
?>