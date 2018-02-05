<?php
	require_once("admin_functions.php");
	include("admin_header.php");

	session_start();
	// if ( 1 == $_SESSION['login'] ) {
		// if ( 1 == $_SESSION['isAdmin'] ) { 
			?>
		<div class="admin-container">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-2">
					<?php
						$current_tab = 'dashboard';
						include("admin_sidebar.php"); 
					?>
					</div>
					<div class="col-md-10">Dashboard</div>
					
				</div>
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