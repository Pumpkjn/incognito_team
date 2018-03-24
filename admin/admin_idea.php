<?php
	require_once("../database.php");
	require_once("../classes/_Ideas.php");
	require_once("../classes/_sub.php");
	require_once("../classes/_User.php");
	require_once("../classes/_deps.php");
	require_once("admin_functions.php");
	include("admin_header.php");

	global $idea,$user,$deps,$sub;
	if ( is_user_login() ) {
		// if ( current_user_can_manage() ) {
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
							<th>Name</th>
							<th>Department</th>
							<th>Topic</th>
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
						?>
						<tbody>
							<tr> 
								<td><?php echo $idea->get_idea_meta( $i['id'], 'title', false ); ?></td>
								<td>
									<?php
									$deparment = $deps->get_dep_by_id( $idea->get_idea_meta( $i['id'], 'dep', false ) );
									echo $deparment['name'];
									?>

								</td>
								<td>
									<?php
									$topic = $sub->get_sub_by_id( $idea->get_idea_meta( $i['id'], 'topic', false ) );
									echo $topic['title'];
									?>
								</td>
								<?php $categories = $idea->get_categories( $i['id'] ); ?>
								 <td>
								 	<?php
								 	if ($categories) {
								 		$cat_array = array();
									 	foreach ( $categories as $cat ):
									 		$cat_array[] = $cat['name'];
									 	endforeach;
									 	echo implode( ',' , $cat_array );
								 	}
								 ?>
								 </td>
								 <?php $author = $user->get_user_by_id( $i['user_id'] ); ?>
								  <td><?php echo $author['email'] ?></td>
								  <td><?php echo $i['date']; ?></td>
								  <td><?php echo $idea->get_idea_meta( $i['id'], 'anonymousSubmit', false ); ?></td>
								  <td>
								  <?php
								  	$package = $idea->get_idea_meta( $i['id'], 'attachment_dir', false );
								  	if ( $package ) { ?>
								  		<a href="modules/download_package.php?idea=<?php echo $i['id']; ?>&package=<?php echo substr( $package, 11 ) ?>" class="download-attachment"><i class="glyphicon glyphicon-download-alt" aria-hidden="true"></a></i>
								  	<?php } ?>
								  </td>
								  <td>
									<a  onclick="return confirm('Do you really want to delete the idea?')" href="modules/admin_delete_idea.php?id=<?php echo $i['id'] ?>"> Delete </a>  	
								  </td>
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
		 // } else {
		 // echo "<script>
	  //       alert('Eh try to cheat huh?');
	  //       window.location.href = '../index.php';
	  //     </script>";
   //    }
	} else {
		echo "<script>
	        alert('Eh try to cheat huh?');
	        window.location.href = '../index.php';
	      </script>";
	}


	include("admin_footer.php");