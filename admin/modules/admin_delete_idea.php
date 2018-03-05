<?php
	require("../../database.php");
	require_once("../../classes/_ideas.php");
	session_start();
	global $database,$idea;

	$id = isset( $_GET['id'] ) ? $_GET['id'] :null ;
	// if ( 1 == $_SESSION['login'] ) {
	if ( $id && $id != '' ) {
		$idea->delete_idea( $id );
		header('Location: ../admin_idea.php');
		exit();
	} else {
		header('Location: ../admin_idea.php?status=error');
		exit();
	}
  // }
?>