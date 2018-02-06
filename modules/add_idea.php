<?php
require("../database.php");
require("../functions.php");

$error = array();
$title = isset( $_POST['idea-name'] ) ? $_POST['idea-name'] : null;

if ( !$title ) {
	$error[] = 'title'; 
}
$description = isset( $_POST['idea-description'] ) ? $_POST['idea-description'] : null;

if ( !$description ) {
	$error[] = 'description'; 
}

$department = isset( $_POST['department'] ) ? $_POST['department'] : null;
$category = isset( $_POST['category'] ) ? $_POST['category'] : null;
$attachment = isset( $_POST['attachment'] ) ? $_POST['attachment'] : null;
var_dump($attachment);

$term = isset( $_POST['term-condition'] ) ? $_POST['term-condition'] : null;
if ( !$term ) {
	$error[] = 'term'; 
}

var_dump( $error );
var_dump($term);
die();



?>