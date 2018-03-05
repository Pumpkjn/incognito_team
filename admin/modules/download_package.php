<?php
	require("../../database.php");
	require_once("../../classes/_user.php");
	require_once("../../classes/_ideas.php");
	function is_user_login() {
		if (session_status() == PHP_SESSION_NONE) {
		    session_start();
		}
		$login = isset( $_SESSION['login'] ) ? $_SESSION['login'] : null;
		if ( $login ) {
			return true;
		} else {
			return false;
		}
	}

	function current_user_can_manage() {
		if (session_status() == PHP_SESSION_NONE) {
		    session_start();
		}
		$can = false;
		if ( is_user_login() ) {
			global $user;
			$role = $_SESSION['role'];
			switch ( $role ) {
				case 0:
					$can = true;
					break;

				case 1:
					$can = false;
					break;

				case 2:
					$can = false;
					break;
				
				default:
					$can = false;
					break;
			}
		}
		return $can;
	}

	function current_user_can_coor() {
		if (session_status() == PHP_SESSION_NONE) {
		    session_start();
		}
		$can = false;
		if ( is_user_login() ) {
			global $user;
			$role = $_SESSION['role'];
			switch ( $role ) {
				case 0:
					$can = true;
					break;

				case 1:
					$can = true;
					break;

				case 2:
					$can = false;
					break;
				
				default:
					$can = false;
					break;
			}
		}
		return $can;
	}




	function download_package( $package_id ) {
		$path = dirname(dirname(dirname (__FILE__))).'/uploads/';
		$dir = $path.$package_id;
		$files = get_files( $package_id, $dir );

		$zipname = $dir.'/file.zip';
		$zip = new ZipArchive;

		$zip->open($zipname, ZipArchive::CREATE);
		foreach ($files as $file) {
		  $zip->addFile( $dir.'/'.$file, $file );
		}

		$zip->close();

		header('Content-Type: application/zip');
		header('Content-disposition: attachment; filename='.$zipname);
		header('Content-Length: ' . filesize($zipname));
		readfile($zipname);
		unlink($zipname);
	}

	function get_files( $package_id, $dir ) {
		
		
		$files = scandir( $dir );
		foreach ( $files as $key => $value) {
			if ( '.' == $value || '..' == $value ) {
				unset( $files[ $key ] );
			}
		}
		return $files;
	}


	session_start();
	global $database,$user,$idea;

	$package = isset( $_GET['package'] ) ?  $_GET['package'] : null;
	$idea_id = isset( $_GET['idea'] ) ?  $_GET['idea'] : null;
	if ( $package ) {
		if ( is_user_login() ) {
			if ( current_user_can_manage() ) {
				download_package( $package );
			} else if ( current_user_can_coor() ) {
				$current_user = $user->get_current_user();
				$current_user_department = $current_user['dep_id'];
				$idea_department = $idea->get_idea_meta( $idea_id, 'dep', false );
				if ( $current_user_department == $idea_department ) {
					download_package( $package );
				} else {
					echo 'You don\'t have permission to download this package.';
					exit;
				}
			} else {
				echo 'You don\'t have permission to download this package.';
				exit(0);
			}
		}
	}
	exit(0);
?>