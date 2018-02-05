<?php
	require("../../database.php");
	require_once("../../classes/Ideals.php");
	require_once("../admin_functions.php");
	session_start();
	global $database,$ideal;

	$cat_name = isset( $_POST['cat-name'] ) ? $_POST['cat-name'] :null ;
	// if ( 1 == $_SESSION['login'] ) {
	if ( $cat_name && $cat_name != '' ) {
	// $sql = "INSERT INTO comment( `products_id` , `user_id`, `noidung` )
	// VALUES ('" . $product_id . "','" . $user_id . "','".$comment."')";
	// $database->execute_query( $sql );

	} else {

	}
  // }
?>