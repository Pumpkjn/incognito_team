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

die();
$title = isset( $_POST['title'] ) ? $_POST['title'] : null;
if ( !$title || '' == $title ) {
	$error['title'] = 'Missing title. You need to input title of the idea request title.';
}

$date = isset( $_POST['date'] ) ? $_POST['date'] : null;

$department = isset( $_POST['department'] ) ? $_POST['department'] : null;

$userID = isset( $_POST['userID'] ) ? $_POST['userID'] : null;
if ( count( $error ) > 0 ) {
	$redirect = 'http://'.$_SERVER['HTTP_HOST'].dirname( dirname($_SERVER['PHP_SELF'] ) ).'/my-department.php?tab=create-sub&error=missing-title';
	header( 'Location: '.$redirect );
	exit();
} else {
	global $idea;
	if ( $date == '' ) {
		$date = date( "Y-m-d H:i:s", strtotime("+7 day") );
	} else {
		$date = date( "Y-m-d H:i:s", strtotime( $date ) );
	}
	$sub_data = array();
	$sub_data['title'] = $title;
	$sub_data['date'] = date( "Y-m-d H:i:s" );
	$sub_data['closure_date'] = $date;
	$sub_data['userID'] = $userID;
	$sub_data['status'] = 'open';
	$sub_data['dep_id'] = $department;
	$new_sub = $sub->insert_sub( $sub_data );
	$redirect = 'http://'.$_SERVER['HTTP_HOST'].dirname( dirname($_SERVER['PHP_SELF'] ) ).'/my-department.php';
	header( 'Location: '.$redirect );
	exit();
}
?>