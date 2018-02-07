<?php

function check_admin( $user_id )
	{
		$conn = new database();
		$sql = 'SELECT role FROM users
				WHERE ID = "'.$user_id.'"';
		$results = $conn->select_query($sql);
		if ( 'admin' == $results['role'] ) {
			$check = true;
		} else {
			$check = false;
		}

		return $check;
	}



session_start();
// die();

require("../database.php");
require_once("../functions.php");




$user_name = $_POST['user_name'];
$password = $_POST['password'];

// $sql = 'SELECT users.* FROM users 
//         WHERE user_name = "'.$user_name.'" 
//             and password = "'.$password.'"';
// $results = $conn->select_query($sql);


// if( $results ){
//         $_SESSION['login'] = 1; // 
      
//         //Luu m?t s? thông tin c?n thi?t c?a ngu?i dang dang nh?p
//         $_SESSION['user_name'] = $results['user_name'];
//         $_SESSION['id'] = $results['ID'];

//         $check_admin = check_admin( $results['ID'] );
//         if ( 1 == $check_admin ) {
//             $_SESSION['isAdmin'] = 1;
//             $redirect = 'admin/admin.php';
//         } else {
//             $_SESSION['isAdmin'] = 0;
//             $redirect = 'index.php';
//         }

//         $data = array(
// 			'login_status' => 'success',
// 			'redirect' => $redirect,
// 		);

// 	    echo json_encode( $data );
//     }
// else
// {

// 	$data = array(
// 		'login_status' => 'error',
// 	);

//     echo json_encode( $data );
// }
// ?>