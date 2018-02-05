<?php
	require_once("../database.php");
	require_once("../classes/Ideals.php");
	require_once("admin_functions.php");
	include("admin_header.php");

	session_start();
	global $ideal;
	// if ( 1 == $_SESSION['login'] ) {
	// 	if ( 1 == $_SESSION['isAdmin'] ) { 
			?>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-2"><?php include("admin_sidebar.php"); ?></div>
					<div class="col-md-10">
					<div class="row">
						<div class="col-md-3">
							<form method="POST" action="modules/admin_add_category.php">
								<div class="form-group">
									<label for="cat-name">Category Name</label>
									<input type="cat-name" name="cat-name" class="form-control" id="cat-name">
								</div>
								<button type="submit" class="btn btn-default">Add</button>
							</form>
						</div>
						<div class="col-md-9">
							<label for="cat-name">Categories</label>
							<table class="table table-bordered">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Actions</th>
								</tr>
							</thead>
							<?php 
								
								$category = $ideal->get_all_category();
							?>
							<?php if ( $category ) : ?>
							<?php foreach ( $category as $idea ) : ?>
								<tbody>
									<tr> 
										<th scope="row">
											<?php echo $r['id']; ?>
										</th> 
										<td><?php echo $r['name']; ?></td>
										 <td><?php echo $r['mota']; ?></td>
										  <td><?php echo $r['term_name']; ?></td>
										  <td><?php echo $r['soluong']; ?></td>
										  <td><?php echo $r['gia']; ?> VNĐ</td>
										  <td>
										  <?php if ( $r['anh'] && $r['anh'] != '' ) : ?>
										  	<img width="32" height="32" src="<?php echo $r['anh']; ?>">
										  <?php endif; ?>
										  	</td>
										  <td>
										  	<a href="suasanpham.php?id=<?php echo $r['id'] ?>&name=<?php echo $r['name'] ?>&mota=<?php echo $r['mota'] ?>&lh=<?php echo $r['loaihang'] ?>&sl=<?php echo $r['soluong'] ?>&gia=<?php echo $r['gia'] ?>&anh=<?php echo $r['anh'] ?>"> Sửa </a> |
											<a href="thuchienxoasanpham.php?id=<?php echo $r['id'] ?>"> Xóa </a>
										  </td>
										   </tr>
										 <tr> 
									</tr>
								</tbody>
							<?php endforeach; ?>
						<?php endif; ?>

							</table>
						</div>
					<div>
					</div>
				</div>
			</div>
		<?php
	// 	 }
	// } else {
	// 	echo '???';
	// }


	include("admin_footer.php");