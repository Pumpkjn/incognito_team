<?php
	require("../../database.php");
	require_once("../../classes/_deps.php");
	require_once("../admin_functions.php");

	session_start();
	global $database,$deps;

	$id = isset( $_GET['id'] ) ? $_GET['id'] :null ;
	// if ( 1 == $_SESSION['login'] ) {
	if ( $id && $id != '' ) {
		$deps->delete_deps( $id );
		header('Location: ../deps.php');
		exit();
	} else {
		header('Location: ../deps.php?status=error');
		exit();
	}
  // }
?>