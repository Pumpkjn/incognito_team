<?php
	require("../../database.php");
	require_once("../../classes/_deps.php");
	// require_once("../admin_functions.php");
	session_start();
	global $database,$deps;

	$deps_name = isset( $_POST['deps-name'] ) ? $_POST['deps-name'] :null ;
	$thumbnail = isset( $_POST['thumbnail'] ) ? $_POST['thumbnail'] :null ;
	// if ( 1 == $_SESSION['login'] ) {
	if ( $deps_name && $deps_name != '' ) {
		$deps->add_deps( $deps_name, $thumbnail );
		header('Location: ../deps.php');
		exit();
	} else {
		header('Location: ../deps.php?status=error');
		exit();
	}	
  // }
?>