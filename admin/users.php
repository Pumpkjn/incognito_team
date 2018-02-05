<?php
	require_once("../database.php");
	require_once("../classes/_user.php");
	require_once("admin_functions.php");
	include("admin_header.php");

	global $user;
	session_start();
	// if ( 1 == $_SESSION['login'] ) {
	// 	if ( 1 == $_SESSION['isAdmin'] ) { 
			?>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-2">
					<?php
						$current_tab = 'user';
						include("admin_sidebar.php");
					?>
					</div>
					<div class="col-md-10"> Users
					<table class="table table-bordered">
					<thead>
						<tr>
							<th>ID</th>
							<th>User Name</th>
							<th>Email</th>
							<th> Role </th>
							<th> Action </th>
						</tr>
					</thead>
					<?php 
						$result = $user->get_all_user();
						if ( $result ) :
					?>
					<?php foreach ( $result as $r ) : ?>
							<tbody>
								<tr> 
									<th scope="row">
										<?php echo $r['id']; ?>
									</th> 
									<td><?php echo $r['tendangnhap']; ?></td>
									 <td><?php echo $r['email']; ?>
									 </td>
									  <td><a href="thuchienxoauser.php?id=<?php echo $r['id'] ?>">Xóa</td>
									   </tr>
									 <tr> 
								</tr>
							</tbody>
						<?php endforeach; ?>
					<?php endif; ?>

					</table>

				</div>

				</div>
			</div>
		<?php
	// 	 }
	// } else {
	// 	echo '???';
	// }


	include("admin_footer.php");