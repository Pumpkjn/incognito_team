<?php
require("../database.php");
require("../functions.php");
$error = array();
$idea_data = array();
// idea info
$title = isset( $_POST['title'] ) ? $_POST['title'] : null;
if ( !$title || '' == $title ) {
	$error['title'] = 'Missing title. You need to input title of the idea.';
}

$desc = isset( $_POST['desc'] ) ? $_POST['desc'] : null;
if ( !$desc || '' == $desc ) {
	$error['desc'] = 'Missing description. You need to input description of the idea.';
}

$dep = isset( $_POST['dep'] ) ? $_POST['dep'] : null;

$cat = isset( $_POST['cat'] ) ? $_POST['cat'] : null;



if ($_FILES) {
	// $att_arr = array();
	// $i = 0;
	$attachment = array();
    foreach ($_FILES as $file => $array ) {
        if ($_FILES[$file]['error'] !== UPLOAD_ERR_OK) {
            echo "upload error : " . $_FILES[$file]['error'];
            die();
        }
        $attachment[ $file ] = $array;
    }
} else {

}

// user info

$isUser = isset( $_POST['isUser'] ) ? $_POST['isUser'] : false;
if ( $isUser && $isUser != 'false' ) {
	$idea_data['user']['isUser'] = true;
	$userID = isset( $_POST['userID'] ) ? $_POST['userID'] : null;
	if ( $userID ) {
		$idea_data['user']['userID'] = $userID;
	}
	
} else {
	$userName = isset( $_POST['userName'] ) ? $_POST['userName'] : null;
	$userEmail = isset( $_POST['userEmail'] ) ? $_POST['userEmail'] : null;
	if ( !$userEmail || '' == $userEmail ) {
		$error['email'] = 'Missing Email. You need to provide your email to submit idea.';
	} else {
		global $user;
		$email_exist = $user->check_exist( $userEmail );
		if ( $email_exist ) {
			$error['email'] = 'Email exist. Email already existed please login or using your own email.';
		} else {
			$idea_data['user']['isUser'] = false;
			$idea_data['user']['name'] = $userName;
			$idea_data['user']['email'] = $userEmail;
		}
		
	}
}
if ( count( $error ) > 0 ) {
	$response = array( 'error' => $error );
	echo json_encode( $response );
} else {
	
	$idea_data['title'] = $title;
	$idea_data['desc'] = $desc;
	$idea_data['dep'] = $dep;
	$idea_data['cat'] = $cat;
	$idea_data['attachment'] = $attachment;
	global $idea;
	$new_idea = $idea->_insert_idea( $idea_data );
	die();
}
die();



?>