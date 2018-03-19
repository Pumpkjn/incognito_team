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

if ( ( $action && 'thumb-up' == $action ) || ( $action && 'thumb-down' == $action ) || 'thumb-up' == $action || 'thumb-down' == $action ) {
	global $user,$idea;
	if ( is_user_login() ) {
		$current_user = $user->get_current_user();
		$postid =  isset( $_POST['postid'] ) ? $_POST['postid'] : null;
		$userid = $current_user['id'];
		$idea->update_vote( $postid, $userid, $action );
		die();
	} else {
		echo json_encode( array( 'error' => true ) );
		die();
	}

}


?>