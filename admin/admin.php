<?php
	include("admin_header.php");

	session_start();
<<<<<<< HEAD
	// if ( 1 == $_SESSION['login'] ) {
		// if ( 1 == $_SESSION['isAdmin'] ) { 
			?>
=======
	if ( 1 == $_SESSION['login'] ) {
		if ( 1 == $_SESSION['isAdmin'] ) { ?>
>>>>>>> 09e8605f9a78b8f670f9b26ce3c449a902802410
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-3"><?php include("admin_sidebar.php"); ?></div>
					<div class="col-md-9">Dashboard</div>
					
				</div>
			</div>
<<<<<<< HEAD
		<?php
		 // } else {
	// 		echo "<script>
	//         alert('Eh try to cheat huh?');
	//         window.location.href = '../index.php';
	//       </script>";
	// 	}
	// } else {
	// 	echo '???';
	// }
=======
		<?php } else {
			echo "<script>
	        alert('Eh try to cheat huh?');
	        window.location.href = '../index.php';
	      </script>";
		}
	} else {
		echo '???';
	}
>>>>>>> 09e8605f9a78b8f670f9b26ce3c449a902802410


	include("admin_footer.php");