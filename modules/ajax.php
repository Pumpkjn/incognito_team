<?php
require("../database.php");
require("../functions.php");
$error = array();



$action = isset( $_POST['action'] ) ? $_POST['action'] : null;

if ( $action && 'change-status' == $action ) {
	// global $sub;
	$requestId = isset( $_POST['requestId'] ) ? $_POST['requestId'] : null;
	$sub->switch_idea_request_status( $requestId );
	$res = array();
	$res['requestId'] = $requestId;
	echo json_encode( $requestId );
	die();
}

if ( $action && 'dep-change' == $action ) {
	$depID = isset( $_POST['depID'] ) ? $_POST['depID'] : null;
	$request_ideas = $deps->get_all_available_request_idea( $depID );
	if ( $request_ideas ) {
		echo json_encode( $request_ideas );
	} else {
		echo json_encode( array( 'error' => true ) );
	}
	
	die();
}

?>