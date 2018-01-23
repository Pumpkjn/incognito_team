<?php

function check_admin( $user_id )
	{
		$conn = new database();
		$sql = 'SELECT role_name FROM role
				WHERE user_id = "'.$user_id.'"';
		$results = $conn->select_query($sql);
		if ( 'admin' == $results['role_name'] ) {
			$check = true;
		} else {
			$check = false;
		}

		return $check;
	}

function check_email( $email )
	{
		$conn = new database();
		$sql = 'SELECT * FROM users
				WHERE email = "'.$email.'"';
		$results = $conn->select_query($sql);
		if ( $results ) {
			$check = true;
		} else {
			$check = false;
		}

		return $check;
	}

function check_tendangnhap( $name )
	{
		$conn = new database();
		$sql = 'SELECT * FROM users
				WHERE tendangnhap = "'.$name.'"';
		$results = $conn->select_query($sql);
		if ( $results ) {
			$check = true;
		} else {
			$check = false;
		}

		return $check;
	}



session_start();

require("../database.php");
require("../functions.php");

$conn = new database();

$tendangnhap = $_POST['tendangnhap'];
$matkhau = $_POST['matkhau'];
$email = $_POST['email'];

$exist_email = check_email( $email );
$exist_name = check_tendangnhap( $tendangnhap );

if ( $exist_email != true && $exist_name != true && $tendangnhap != '' &&  $email != '' ) {
		$sql = "INSERT INTO users( `tendangnhap` , `matkhau`, `email` )
					VALUES ('" . $tendangnhap . "','" . $matkhau . "','".$email."')";
		$conn->execute_query( $sql );

		$user_result = get_user_id( $tendangnhap );
		$user_id = $user_result['id'];

		$sql1 = "INSERT INTO role( `user_id` , `role_name` )
					VALUES ('" . $user_id . "','subscriber')";
		$conn->execute_query( $sql1 );		

		$_SESSION['login'] = 1; // асnh d?u lр dу dang nh?p

		         //Luu m?t s? thєng tin c?n thi?t c?a ngu?i dang dang nh?p
        $_SESSION['tendangnhap'] = $user_result['tendangnhap'];
        $_SESSION['id'] = $user_result['id'];

        $check_admin = check_admin( $user_result['id'] );
        if ( 1 == $check_admin ) {
            $_SESSION['isAdmin'] = 1;
            $redirect = 'admin/admin.php';
        } else {
            $_SESSION['isAdmin'] = 0;
            $redirect = 'index.php';
        }

        $data = array(
			'login_status' => 'success',
			'redirect' => $redirect,
		);

		 echo json_encode( $data );

} else {
		$data = array(
			'login_status' => 'false',
		);

		 echo json_encode( $data );
}

// $sql = 'SELECT * FROM users 
//         WHERE tendangnhap = "'.$tendangnhap.'" 
//             and matkhau = "'.$matkhau.'"';
// $results = $conn->select_query($sql);
// if( $results ){
//         $_SESSION['login'] = 1; // асnh d?u lр dу dang nh?p
      
  //       //Luu m?t s? thєng tin c?n thi?t c?a ngu?i dang dang nh?p
  //       $_SESSION['tendangnhap'] = $results['tendangnhap'];
  //       $_SESSION['id'] = $results['id'];

  //       $check_admin = check_admin( $results['id'] );
  //       if ( 1 == $check_admin ) {
  //           $_SESSION['isAdmin'] = 1;
  //           $redirect = 'admin/admin.php';
  //       } else {
  //           $_SESSION['isAdmin'] = 0;
  //           $redirect = 'index.php';
  //       }

  //       $data = array(
		// 	'login_status' => 'success',
		// 	'redirect' => $redirect,
		// );

// 	    echo json_encode( $data );
//     }
// else
// {

// 	$data = array(
// 		'login_status' => 'error',
// 	);

//     echo json_encode( $data );
// }
?>