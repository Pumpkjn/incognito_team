<?php
	include("admin_header.php");

	session_start();
	// if ( 1 == $_SESSION['login'] ) {
		// if ( 1 == $_SESSION['isAdmin'] ) { 
			?>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-3"><?php include("admin_sidebar.php"); ?></div>
					<div class="col-md-9">Dashboard</div>
					
				</div>
			</div>
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

	include("admin_footer.php");