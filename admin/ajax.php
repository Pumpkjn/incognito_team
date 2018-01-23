<?php
	require_once("../database.php");
	require_once("admin_functions.php");
	include("admin_header.php");

	session_start();
	if ( 1 == $_SESSION['login'] ) {
		if ( 1 == $_SESSION['isAdmin'] ) { ?>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-2"><?php include("admin_sidebar.php"); ?></div>
					<div class="col-md-10"> Bảng người dùng
					<table class="table table-bordered">
					<thead>
						<tr>
							<th>ID</th>
							<th>Tên đăng nhập</th>
							<th>Email</th>
							<th> Hành Động </th>
						</tr>
					</thead>
					<?php 
						$con = new database();
						$sql = 'SELECT * FROM users';
						$result = $con->select_all_query( $sql );
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


					</table>

				</div>

				</div>
			</div>
		<?php }
	} else {
		echo '???';
	}


	include("admin_footer.php");