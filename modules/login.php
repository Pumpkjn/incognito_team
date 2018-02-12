<?php

session_start();
// die();

require("../database.php");
require_once("../functions.php");


global $database,$user;

$email = $_POST['email'];
$password = $_POST['password'];
$sql = 'SELECT users.* FROM users 
        WHERE email = "'.$email.'" 
            and password = "'.$password.'"';

$results = $database->select_query($sql);
if( $results ){
        $_SESSION['login'] = 1; // 
        $username = $results['username'];
        if ( !$username || $username == '' ) {
            $username = $results['email'];
        }
        $_SESSION['id'] = $results['id'];
        $_SESSION['role'] = $results['role'];

        if ( 0 == $results['role'] ) {
        	header('Location: ../admin/admin.php');
			exit();
        } else {
        	header('Location: ../index.php');
			exit();
        }
    }
else
{
	header('Location: ../login.php?login_fail=true');
	die();
}
?>