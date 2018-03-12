<?php
	require_once("database.php");
	require_once("functions.php");
	include("header.php");
	$current_tab = 'my-idea';
	include("top_nav.php");
	global $deps,$idea,$user,$sub;
	
?>
	<div class="container submit-container main-container">
	<?php if ( is_user_login() ) : ?>
		<?php $current_user = $user->get_current_user(); ?>
		<div class="row">
			<div class="col-md-12">
				<?php if ( !current_user_can_manage() ) : ?>
				<?php $deps_name = $user->get_user_department( $current_user['id'] ); ?>
				<div class="panel panel-default">
	                <div class="panel-heading">
						<h1><?php echo $deps_name['name']; ?></h1>
					</div>
				</div>
				<?php endif; ?>
			</div>		
		</div>
		<div class="row">
			<div class="col-md-12">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                	<?php 
	                	$current_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : 'idea-request';
	                	?>
	                    <ul class="nav nav-tabs">
							<li class="<?php echo get_active_tab( $current_tab, 'idea-request' ) ?>"><a data-toggle="tab" href="#idea-request">Topics</a></li>
							<?php if ( current_user_can_coor() ) { ?>
								<li class="<?php echo get_active_tab( $current_tab, 'create-sub' ) ?>"><a data-toggle="tab" href="#create-sub">Create Topic</a></li>
							<?php } ?>
							
						</ul>
	                </div>
					<div class="panel-body">
					<div class="tab-content">
					<div id="idea-request" class="tab-pane <?php echo get_active_tab( $current_tab, 'idea-request' ) ?>">
						<h3>Topics</h3>
						<?php $idea_request = $sub->get_sub_by_user( $current_user['id'] );  ?>
						<div>
							<ul class="list-group">
							 	<?php foreach ( $idea_request as $request ): ?>
							 		<li class="list-group-item">
							 			<p>
								 			<div class="row idea-request-list">
								 				<div style="margin-left: 10px;">
								 					<a data-toggle="collapse" href="#tab-<?php echo $request['id'] ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
													    <?php echo $request['title']; ?>
													</a>
								 				</div>
								 				<?php if ( current_user_can_coor() ): ?>
								 					<div class="pull-right" style="margin-right: 10px;"><a href="modules/delete_sub.php?id=<?php echo $request['id'] ?>" onclick="return confirm('Do you really want to delete the topic?')"><i class="glyphicon glyphicon-remove" style="font-size: 22px;top: 2px;"></i></a></div>
								 				<?php endif ?>
								 				
								 				<div class="pull-right switch-btn">
								 				<?php
								 				$check = '';
								 				if ( $request['status'] == 0 ) {
								 					$check = '';
								 				} else {
								 					$check = 'checked';
								 				}

								 				?>
										 			<label class="switch">
														<input data-action="change-status" class="idea-request-switch" data-id="<?php echo $request['id'] ?>" type="checkbox" <?php echo $check; ?>>
														<span class="slider round"></span>
													</label>
												</div>
												
											</div>
										</p>
										<div class="collapse in" id="tab-<?php echo $request['id'] ?>">
											<div class="card card-body">
												<?php 
													$ideas = $idea->get_idea_from_topic( $request['id'] );
												?>
												<?php if ( $ideas ): ?>
													<ul class="list-group">
													<?php foreach ( $ideas as $i ):	?>
														<?php $author = $user->get_user_by_id( $i['user_id'] ); ?>
														 <li class="list-group-item">
															 <a href="idea.php?id=<?php echo $i['id']; ?>"><?php echo $idea->get_idea_meta( $i['id'], 'title', false ) ?> -
															  <?php echo $author['email'] ?>
															  </a>
															 <div class="pull-right"><a href="modules/delete_idea.php?id=<?php echo $i['id'] ?>" onclick="return confirm('Do you really want to delete the idea?')"><i class="glyphicon glyphicon-remove"></i></a></div>
														 </li>
													<?php endforeach; ?>
													</ul>
												<?php endif ?>
											</div>

											<div>
												<?php 
												$item_perpage = 1;
												$current_page = 1;
												$total_records = $ideas;
												$total_pages = 1;
												$page_url = 1;
												

												// echo ajax_paginate( $item_perpage, $current_page, $total_records, $total_pages, $page_url );
												?>
											</div>
										</div>
							 		</li>
							 	<?php endforeach ?>
							</ul>
						</div>
					</div>
					<?php if ( current_user_can_coor() ) { ?>
						<div id="create-sub" class="tab-pane <?php echo get_active_tab( $current_tab, 'create-sub' ) ?>">
							<form method="POST" action="modules/add_sub.php" class="form-horizontal">
								<div class="form-group title-group">
									<label class="col-sm-3" for="title">Title</label>
									<div class="col-sm-9">
										<input type="text" name="title" class="form-control" placeholder="Title" id="idea-title">
									</div>
								</div>
								<div class="form-group desc-group">
									<label class="col-sm-3" for="date">Close Date</label>
									<div class="col-sm-9">
										<input type="date" name="date" class="form-control" id="due-date">
									</div>
								</div>
								<?php if ( current_user_can_manage() ) { ?>
									<div class="form-group">
										<?php
											$departments = $deps->get_all_department();
										?>
										<label class="col-sm-3" for="department">Choose Department</label>
										<div class="col-sm-4">
											<select name="department" id="idea-dep" class="form-control">
												<?php foreach ( $departments as $d ) { ?>
													<option value="<?php echo $d['id'] ?>"><?php echo $d['name'] ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								<?php } else { 
									$department = $user->get_user_department_id( $current_user['id'] );
									?>
									<input type="hidden" name="department" value="<?php echo $department['id'] ?>">
								<?php } ?>
									<input type="hidden" name="userID" id="user-id" value="<?php echo $current_user['id']; ?>">
								<button id="sub-submit" type="submit" class="btn btn-primary submit-button">Create</button>
							</form>
						</div>
					<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>

<?php 
	include("footer.php");
?>
