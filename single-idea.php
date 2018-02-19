<?php
	require_once("database.php");
	require_once("functions.php");
	require_once("classes/_user.php");
	include("header.php");
	$current_tab = 'profile';
	include("/templates/top_nav.php");
?>

<div class="container main-container">
	<div class="row">
		<div class="col-xs-12 col-md-9">
			<div class="panel panel-default">
				<?php
				global $user;
				$user_id = isset( $_GET['user-id'] ) ? $_GET['user-id'] : null;
				if ( $user_id ) { ?>
					<?php 
						$user_data = $user->get_user_by_id( $user_id );
					?>
					<?php if ( $user_data ): ?>
						<div class="panel-heading">
							User information
						</div>
						<div class="panel-body">
								<div class="media">
									<div class="media-left pull-left">
										<a>
											<img class="img-circle" src="assets/img/a1.png">
										</a>
									</div>
									<div class="media-body">
										<div class="media-heading">
											<a><h4><?php echo $user_data['name']; ?></h4></a>
										</div>
										<table class="table">
											<tr>
												<td>Role:</td>
												<td><?php echo $user->get_role_text( $user_data['role'] ); ?></td>
											</tr>
											<tr>
												<td>Department: </td>
												<?php $deps = $user->get_user_department( $user_data['id'] ); ?>
												<?php if ( $deps ): ?>
													<td><?php echo implode( ',' , $deps) ?></td>
												<?php endif ?>
												
											</tr>
										<!--     <tr>
												<td>Date of birth: </td>
												<td>03/02/1994</td>
											</tr> -->
											<tr>
												<td>Email:</td>
												<td><?php echo $user_data['email']; ?></td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						<?php else: ?>
							<div class="panel-heading">
								No user found.
							</div>
						<?php endif ?>
				<?php } else {
					if ( is_user_login() ) : ?>
						<?php
							$user_data = $user->get_current_user();
						?>

						<div class="panel-heading">
							User information
						</div>
						<div class="panel-body">
							<div class="media">
								<div class="media-left pull-left">
									<a>
										<img class="img-circle" src="assets/img/a1.png">
									</a>
								</div>
								<div class="media-body">
									<div class="media-heading">
										<a><h4><?php echo $user_data['name']; ?></h4></a>
									</div>
									<table class="table">
										<tr>
											<td>Role:</td>
											<td><?php echo $user->get_role_text( $user_data['role'] ); ?></td>
										</tr>
										<tr>
											<td>Department: </td>
											<?php $deps = $user->get_user_department( $user_data['id'] ); ?>
											<?php if ( $deps ): ?>
												<td><?php echo implode( ',' , $deps) ?></td>
											<?php endif ?>
											
										</tr>
									<!--     <tr>
											<td>Date of birth: </td>
											<td>03/02/1994</td>
										</tr> -->
										<tr>
											<td>Email:</td>
											<td><?php echo $user_data['email']; ?></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						<div class="panel-footer">
							<ul class="list-inline pull-right">
								<li>
									<a role="button" type="button" class="btn btn-default" href="change_profile.php" title="Profile Change">
										<span class="glyphicon glyphicon-cog"  aria-hidden="true"></span>
									</a>
								</li>
								<li>
									<a role="button" type="button" class="btn btn-default" href="change_password.php" title="Profile Change">
										<span class="glyphicon glyphicon-repeat"  aria-hidden="true"></span>
									</a>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<?php else: ?>
							<div class="panel-heading">
							  <strong>Info!</strong>You need to <a href="login.php">login</a> to see your profile.
							</div>
					<?php endif; ?>
				<?php }	 ?>
			</div>
	  </div>
	
	<div class="col-xs-12 col-md-3">
			<!-- Search box-->
			<?php include("/templates/search_box.php"); ?>
			<?php include("/templates/categories_box.php"); ?>
			<?php include("/templates/popular_ideas_box.php"); ?>
		</div>
	</div>
</div>
<?php 
	include("footer.php");
?>
