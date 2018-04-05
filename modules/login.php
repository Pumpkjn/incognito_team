<?php

session_start();
// die();

require("../database.php");
require_once("../functions.php");
require_once("../classes/_User.php");


global $database,$user;

$email = $_POST['email'];
$password = $_POST['password'];
$encryptedpass = $user->EncryptPassword($password, $email);
$sql = 'SELECT users.* FROM users 
        WHERE email = "'.$email.'" 
            and password = "'.$encryptedpass.'"';

$results = $database->select_query($sql);

if( $results ){
        $_SESSION['login'] = 1; // 
        $username = $results['username'];
        if ( !$username || $username == '' ) {
            $username = $results['email'];
        }
        $_SESSION['id'] = $results['id'];
        $_SESSION['role'] = $results['role'];

        $user->add_user_meta( $results['id'], 'last_login', date("F j, Y, g:i a") );

        if ( 0 == $results['role'] ) {
        	header('Location: ../admin/admin.php');
			exit();
        } else {
        	header('Location: ../user_profile.php');
			exit();
        }
    }
else
{
	header('Location: ../login.php?login_fail=true');
	die();
}
?>