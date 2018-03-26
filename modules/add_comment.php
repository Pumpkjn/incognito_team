<?php
require("../database.php");
require("../functions.php");
$error = array();

// idea info
$comment = isset( $_POST['comment'] ) ? $_POST['comment'] : null;
$idea_id = isset( $_POST['idea_id'] ) ? $_POST['idea_id'] : null;
if ( !$comment || '' == $comment ) {
	header("Location: ../idea.php?id=".$idea_id);
	die();
}
$anonymousComment = isset( $_POST['anonymousComment'] ) ? $_POST['anonymousComment'] : 0;
$current_user = $user->get_current_user();
global $database;
$sql = "INSERT INTO comments( `idea_id`, `content`, `user_id`, `date`, `comment_status` )
			VALUES ('" . $idea_id . "','" . $comment . "','" . $current_user['id'] . "', '" . date("Y-m-d H:i:s") . "','" . $anonymousComment . "')";
$result = $database->execute_query_return_result( $sql );
$dep = $idea->get_idea_meta( $idea_id, 'dep', false );
send_email( $dep, $idea_id, $comment, 'comment', $result );
header("Location: ../idea.php?id=".$idea_id);
exit();

?>