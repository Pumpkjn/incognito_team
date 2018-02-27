<?php
	require("../../database.php");
	require_once("../../classes/_Ideas.php");
	// require_once("../admin_functions.php");
	session_start();
	global $database,$idea;

	$cat_name = isset( $_POST['cat-name'] ) ? $_POST['cat-name'] :null ;
	// if ( 1 == $_SESSION['login'] ) {
	if ( $cat_name && $cat_name != '' ) {
		$idea->add_category( $cat_name );
		header('Location: ../addcategory.php');
		exit();
	} else {
		header('Location: ../addcategory.php?status=error');
		exit();
	}
  // }
?>