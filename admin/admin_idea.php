<?php
	require_once("../database.php");
	require_once("../classes/_Ideas.php");
	require_once("admin_functions.php");
	include("admin_header.php");

	global $idea,$user;
	if ( is_user_login() ) {
		if ( current_user_can_manage() ) {
			?>
		<div class="admin-container">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-2">
						<?php
							$current_tab = 'idea';
							include("admin_sidebar.php"); 
						?>
					</div>
					<div class="col-md-10">
						<nav class="nav">
							Ideas |
							<a href="addcategory.php"> Add Category </a>
						</nav>
					<table class="table table-bordered">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Category</th>
							<th>Email</th>
							<th>Date</th>
							<th>Anonymous submit</th>
							<th>Download Attachment</th>
							<th>Actions</th>
						</tr>
					</thead>
					<?php 
						
						$ideas = $idea->get_all_ideas();
					?>
					<?php if ( $ideas ) : ?>
					<?php foreach ( $ideas as $i ) : 
						var_dump( $i );
						?>
						<tbody>
							<tr> 
								<th scope="row">
									<?php echo $i['id']; ?>
								</th> 
								<td><?php echo $idea->get_idea_meta( $i['id'], 'title', false ); ?></td>
								<?php $categories = $idea->get_categories( $i['id'] ); ?>
								 <td>
								 	<?php
								 	$cat_array = array();
								 	foreach ( $categories as $cat ):
								 		$cat_array[] = $cat['name'];
								 	endforeach;
								 	echo implode( ',' , $cat_array );
								 ?>
								 </td>
								 <?php $author = $user->get_user_by_id( $i['user_id'] ); ?>
								  <td><?php echo $author['email'] ?></td>
								  <td><?php echo $i['date']; ?></td>
								  <td><?php echo $idea->get_idea_meta( $i['id'], 'anonymousSubmit', false ); ?></td>
								  <td></td>
								  <td>Delete</td>
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