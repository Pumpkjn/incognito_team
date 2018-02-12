<?php
	require_once("../database.php");
	require_once("../classes/_deps.php");
	require_once("admin_functions.php");
	include("admin_header.php");

	global $deps;
	if ( is_user_login() ) {
		if ( current_user_can_manage() ) { 
			?>
		<div class="admin-container">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-2">
						<?php
							$current_tab = 'deps';
							include("admin_sidebar.php"); 
						?>
					</div>
					<div class="col-md-10">
					<div class="row">
						<div class="col-md-3">
							<form method="POST" action="modules/admin_add_deps.php">
								<h3> Add Department </h3>
								<div class="form-group">
									<label for="deps-name">Department Name</label>
									<input type="deps-name" name="deps-name" class="form-control" id="deps-name">
								</div>
								<div class="form-group">
									<label for="thumbnail">Thumbnail</label>
									<input type="thumbnail" name="thumbnail" class="form-control" id="thumbnail">
								</div>
								<button type="submit" class="btn btn-default">Add</button>
							</form>
						</div>
						<div class="col-md-9">
							<label for="cat-name">Departments</label>
							<table class="table table-bordered">
							<thead>
								<tr>
									<th>Name</th>
									<th>Thumbnail</th>
									<th>Actions</th>
								</tr>
							</thead>
							<?php 
								$department = $deps->get_all_department();
							?>
							<?php if ( $department ) : ?>
							<?php foreach ( $department as $dep ) : ?>
								<tbody>
									<tr> 
										<td><?php echo $dep['name']; ?></td>
										 <td><?php echo $deps->get_deps_meta( $dep['id'], 'thumbnail', false ) ?></td>
										  <td>
											<a href="modules/admin_delete_deps.php?id=<?php echo $dep['id'] ?>"> Delete </a>
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
		</div>
		<?php
		 } else {
		 echo "<script>
	        alert('Eh try to cheat huh?');
	        window.location.href = '../index.php';
	      </script>";
      }
	} else {
		echo "<script>
	        alert('Eh try to cheat huh?');
	        window.location.href = '../index.php';
	      </script>";
	}


	include("admin_footer.php");