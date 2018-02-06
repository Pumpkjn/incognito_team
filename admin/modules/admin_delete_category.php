<?php
	require("../../database.php");
	require_once("../../classes/_Ideals.php");
	require_once("../admin_functions.php");

	session_start();
	global $database,$idea;

	$id = isset( $_GET['id'] ) ? $_GET['id'] :null ;
	// if ( 1 == $_SESSION['login'] ) {
	if ( $id && $id != '' ) {
		$idea->delete_category( $id );
		header('Location: ../addcategory.php');
		exit();
	} else {
		header('Location: ../addcategory.php?status=error');
		exit();
	}
  // }
?>