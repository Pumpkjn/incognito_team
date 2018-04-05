<?php
	require("../../database.php");
	require_once("../../classes/_user.php");
	require_once("../admin_functions.php");

	session_start();
	global $database,$deps;

	$id = isset( $_GET['id'] ) ? $_GET['id'] :null ;
	if ( 1 == $_SESSION['login'] ) {
		if ( $id && $id != '' ) {
			$user->block_user( $id );
			header('Location: ../users.php');
			exit();
		} else {
			header('Location: ../users.php?status=error');
			exit();
		}
	  }
?>