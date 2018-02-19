<?php
require("../database.php");
require("../functions.php");
$error = array();

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

$anonymousSubmit = isset( $_POST['anonymousSubmit'] ) ? $_POST['anonymousSubmit'] : null;

$userID = isset( $_POST['userID'] ) ? $_POST['userID'] : null;
$attachment = array();
if ($_FILES) {
	// $att_arr = array();
	// $i = 0;
    foreach ($_FILES as $file => $array ) {
        if ($_FILES[$file]['error'] !== UPLOAD_ERR_OK) {
            echo "upload error : " . $_FILES[$file]['error'];
            die();
        }
        $attachment[ $file ] = $array;
    }
} else {

}

if ( count( $error ) > 0 ) {
	$response = array( 'error' => $error );
	echo json_encode( $response );
} else {
	global $idea;
	$idea_data = array();
	$idea_data['title'] = $title;
	$idea_data['desc'] = $desc;
	$idea_data['dep'] = $dep;
	$idea_data['cat'] = $cat;
	$idea_data['attachment'] = $attachment;
	$idea_data['anonymousSubmit'] = $anonymousSubmit;
	$idea_data['userID'] = $userID;
	$new_idea = $idea->insert_idea( $idea_data );
	$redirect = 'http://'.$_SERVER['HTTP_HOST'].dirname( dirname($_SERVER['PHP_SELF'] ) ).'/single-idea.php?id='.$new_idea;
	$response = array( 'success' => true, 'redirect' => $redirect );
	echo json_encode( $response );
}
?>