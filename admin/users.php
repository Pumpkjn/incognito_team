<?php
	require_once("../database.php");
	require_once("../classes/_user.php");
	require_once("../classes/_deps.php");
	require_once("admin_functions.php");
	include("admin_header.php");

	global $deps,$idea;
	if ( is_user_login() ) {
		if ( current_user_can_manage() ) { 
			?>
		<div class="admin-container">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-2">
						<?php
							$current_tab = 'user';
							include("admin_sidebar.php"); 
						?>
					</div>
					<div class="col-md-10">
					<div class="row">
						<div class="col-md-3">
							<h3> Add User </h3>
							<form method="POST" action="modules/admin_add_user.php">
								<div class="form-group">
									<label for="display-name">Display Name</label>
									<input type="display-name" name="display-name" class="form-control" id="display-name">
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input type="text" name="password" class="form-control" id="password">
									<button id="generate-password">Generate Password</button>
								</div>
								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" name="email" class="form-control" id="email">
									<?php $status = isset( $_GET['status'] ) ? $_GET['status'] : null; ?>
									<?php if ( $status && $_GET['code'] ):
										$code = isset( $_GET['code'] ) ? $_GET['code'] : null;
										if ( $code ) {
											if ( 'email_null' == $code ) { ?>
												<div class="alert alert-danger" role="alert">
													You need to input email!
												</div>
											<?php } else if ( 'email_exist' == $code  ) { ?>
												<div class="alert alert-danger" role="alert">
													Email already exist.
												</div>
											<?php }
										}

									endif; ?>
								</div>
								<div class="form-group">
									<label for="role">Role</label>
									</br>
									<select name="role" id="role-select">
										<option value="2">Staff</option>
										<option value="1">QA Coordinator</option>
										<!-- <option value="0">Admin</option> -->
									</select>
								</div>
								<div class="form-group">
									<?php
										$departments = $deps->get_all_department();
									?>
									<label for="department">Choose Department</label>
									</br>
									<select name="deps" id="department-select">
										<?php foreach ( $departments as $d ) { ?>
											<option value="<?php echo $d['id'] ?>"><?php echo $d['name'] ?></option>
										<?php } ?>
									</select>
									</br>
								</div>
								<button type="submit" class="btn btn-default">Add</button>
							</form>
						</div>
						<div class="col-md-9">
							<label for="cat-name">Users</label>
							<table class="table table-bordered">
							<thead>
								<tr>
									<th>Display Name</th>
									<th>Email</th>
									<th>Role</th>
									<th>Department</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php 
								$users = $user->get_all_user();
							?>
							<?php if ( $users ) : ?>
							<?php foreach ( $users as $u ) : ?>
								<tbody>
									<tr> 
										<td><?php echo $u['name']; ?></td>
										 <td><?php echo $u['email']; ?></td>
										 <td><?php echo $user->get_role_text( $u['role'] ); ?></td>
										 <td>
										 	<?php
										 		if ( $u['dep_id'] ) {
										 			$department = $deps->get_dep_by_id( $u['dep_id'] );
											 		if ( $department ) {
											 			echo $department['name'];
											 		}
												}
										 	?>
										 </td>
										  <td>
											<a  onclick="return confirm('Do you really want to delete the user?')" href="modules/admin_delete_user.php?id=<?php echo $u['id'] ?>"> Delete </a>
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
}
include("admin_footer.php");