<?php
require_once("database.php");
require_once("functions.php");
include("header.php");
include("top_nav.php");
?>
<body>
<?php 
	$post_id = isset( $_GET['id'] ) ? $_GET['id'] : null;
?>
<?php if ( $post_id ): 
global $idea;
$post = $idea->get_idea_by_id( $post_id );
if ( $post ) {
?>
	<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-9">
			<!-- the start of an idea -->
			<div class="panel panel-default">
			<?php if ( is_user_login() ):
				$current_user = $user->get_current_user();
				$user_status = $user->get_user_meta( $current_user['id'], 'block', true );
			endif; ?>
			<?php if ( is_user_login() && $user_status ) : ?>
				You are blocked by Admin.
			<?php else: ?>
				<div class="panel-heading ">
					<h4 class="pull-left">
						<?php echo $idea->get_idea_meta( $post_id, 'title', false ); ?>
					</h4>

					<div class="cats pull-right ">
					   <?php $cats = $idea->get_idea_categories( $post_id ); ?>
					   <?php if ( $cats ): ?>
						<h5 style="display: inline-block;">Categories:
						   <?php foreach ( $cats as $cat ): ?>
							   <a href="idea_page.php?cat_id=<?php echo $cat['category_id'] ?>"><span class="label label-primary"><?php echo $cat['name'] ?></span></a>
						   <?php endforeach ?>
						   </h5>
					   <?php endif ?>
						<?php if ( is_user_login() ): ?>
							<?php if ( current_user_can_coor() ): ?>
								<?php
									$user_id = $_SESSION['id'];
									$user_department = $user->get_user_department_id( $user_id );
									$idea_department = $idea->get_idea_meta( $post_id, 'dep', false );
									if ( $user_department['id'] == $idea_department || $_SESSION['role'] == '0' ) { ?>
										<h5 style="display: inline-block;">
										| <a href="admin/modules/admin_delete_idea.php?id=<?php echo $post_id ?>" onclick="return confirm('Do you really want to delete the Idea?')"> Delete </a> 
										</h5>
									<?php }
								?>
							<?php endif ?>
						<?php endif ?>


					</div>
					<div class="clearfix"></div>
				</div>

				<div class="panel-body">
					<?php echo $idea->get_idea_meta( $post_id, 'desc', false ); ?>
				</div>
				<?php if ( is_user_login() ): ?>
							<?php if ( current_user_can_coor() ): ?>
								<?php
									$user_id = $_SESSION['id'];
									$user_department = $user->get_user_department_id( $user_id );

									$idea_department = $idea->get_idea_meta( $post_id, 'dep', false );
									if ( $user_department['id'] == $idea_department || $_SESSION['role'] == '0' ) { 
										$attachment = $idea->get_idea_meta( $post_id, 'attachment_dir', false );
										?>
										<?php if ( $attachment && $attachment != '' ): ?>
											<div id="attachment-container">
												<a href="admin/modules/download_package.php?idea=<?php echo $post_id ?>&amp;package=<?php echo substr( $attachment, 11 ) ?>" class="download-attachment">Download Attachment <i class="glyphicon glyphicon-download-alt" aria-hidden="true"></i></a>
											</div>
										<?php endif ?>
										
									<?php }
								?>
								
							<?php endif ?>
						<?php endif ?>
				<div class="panel-footer">
					<ul class="list-inline pull-left">
						<li>
							<a href="javascript:void(0)" class="action-thumb" data-action="thumb-up" data-postid="<?php echo $post_id ?>" >
								<span class="glyphicon glyphicon-thumbs-up"></span>
								<span>
									<?php   
										$thumbup_users = $idea->get_idea_meta( $post_id, 'thumbup', false );
										if ( !$thumbup_users ) {
											$up = 0;
										} else {
											$thumbup_arr = explode(',', $thumbup_users);
											$up = count( $thumbup_arr );
										}
										echo $up;
									?>
								</span>
							</a>
						</li>
						<li>|</li>
						<li>
							<a href="javascript:void(0)" class="action-thumb" data-action="thumb-down" data-postid="<?php echo $post_id ?>" >
								<span class="glyphicon glyphicon-thumbs-down"></span>
								<span>
									<?php   
										$thumdown_users = $idea->get_idea_meta( $post_id, 'thumbdown', false );
										if ( !$thumdown_users ) {
											$down = 0;
										} else {
											$thumdown_arr = explode(',', $thumdown_users);
											$down = count( $thumdown_arr );
										}
										echo $down;
									?>
								</span>
							</a>
						</li>
						<li>|</li>
						<li>
							<a href="#">
								<span class="glyphicon glyphicon-comment"></span>
								<span>
									<?php $count_comment = count_comment( $post_id ); ?>
									<?php echo $count_comment; ?> 
									<?php if ( $count_comment >= 2 ): ?>
										&nbsp;Comments
									<?php else: ?>
										&nbsp;Comment
									<?php endif ?>

								</span>
							</a>
						</li>
						<li>|</li>
						<li>
							<?php 
								$reported = $idea->get_idea_meta( $post_id, 'reported', false );
							?>
							<?php if ( $reported ) : ?>
									<span class="alert alert-warning" style="padding: 1px;color: red;"> This idea is being reported. </span>
							<?php else: ?>
								<a href="modules/report.php?id=<?php echo $post_id ?>" style="color:#FF7F50;" onclick="return confirm('Do you really want to report the idea?')">Report</a>
							<?php endif; ?>
						</li>
					</ul>
					<ul class="list-inline pull-right">
						<li>
							<span class="glyphicon glyphicon-calendar"></span>
                            <?php
                            $date= new DateTime($post["date"]);
                            echo $date->format("M j, Y");
                            ?>
						</li>
						<li>|</li>
						<li>
							<span class="glyphicon glyphicon-user"></span>
							by
							<?php
							$status = $post['status'];
							$dep_id = $idea->get_idea_meta( $post_id, 'dep', false );
							if ( $status ) {
								if ( !is_user_login() ) {
									echo 'Anonymous';
								} else {
									if ( !current_user_can_coor() ) {
										if ( $post['user_id'] == $user_id ) { ?>
											<a href="profile.php?id=<?php echo $post['user_id']; ?>">
												<?php echo $author['name']; ?>
											</a>
										<?php } else  {
											echo 'Anonymous';
										}
									} else if ( $dep_id != $user->get_current_user_department() && null != $user->get_current_user_department() ) {
										echo 'Anonymous';
									} else {
										$author = $user->get_user_by_id( $post['user_id'] );
										?>
										<a href="profile.php?id=<?php echo $post['user_id']; ?>">
											<?php echo $author['name']; ?>
										</a>
									<?php }
								}
							} else {
								$author = $user->get_user_by_id( $post['user_id'] );
								?>
								<a href="profile.php?id=<?php echo $post['user_id']; ?>">
									<?php echo $author['name']; ?>
								</a>
							<?php } ?>
						</li>
					</ul>
					<div class="clearfix"></div>
					<div class="divider"></div>
					<ul class="media-list">
						<!--         submit comment-->
						<?php if ( is_user_login() ) { ?>
							<li class="media">
								<div class="media-left pull-left arrow-media-left">
									<a href="#">
										<img class="media-object img-circle" src="assets/img/a1.png">
									</a>
								</div>
								<div class="media-body">
									<div class="media-content">
										<form action="modules/add_comment.php" method="POST">
											<div class="form-group">
												<textarea class="form-control" rows="3" placeholder="Comment" name="comment"></textarea>
												<input type="checkbox" name="anonymousComment" value="1"> Comment as Anonymous
												<input type="hidden" name="idea_id" value="<?php echo $post_id ?>">
											</div>
											<input type="submit" class="btn btn-primary">
										</form>

									</div>

								</div>
							</li>
						<?php } ?>
						<?php $comments = get_all_comments( $post_id ); ?>
						<?php if ( $comments ): ?>
							<?php foreach ( $comments as $comment ): ?>
								<?php
									$comment_author = $user->get_user_by_id( $comment['user_id'] );
									
								?>
								<?php
								$comment_status = $comment['comment_status'];
								$dep_id = $idea->get_idea_meta( $post_id, 'dep', false );
								$user_id = isset( $_SESSION['id'] ) ? $_SESSION['id'] : null;
								if ( $comment_status ) {
									if ( !is_user_login() ) {
										$author_name = 'Anonymous';
										} else {
											if ( !current_user_can_coor() ) {
												if ( $post['user_id'] == $user_id ) {
													$author_name = $comment_author['name'];
												} else  {
													$author_name = 'Anonymous';
												}
											} else if ( $dep_id != $user->get_current_user_department() && null != $user->get_current_user_department() ) {
												$author_name = 'Anonymous';
											} else {
												$author_name = $comment_author['name'];
											}
										}
									} else {
										$author_name = $comment_author['name']; 
									} ?>
								<li class="media" data-comment="<?php echo $comment['id'] ?>">
									<div class="media-left pull-left arrow-media-left">
										<a href="javascript:void(0)">
											<img class="media-object img-circle" src="assets/img/a1.png" >
										</a>
									</div>
									<div class="media-body">
										<div class="media-content">
											<h4 class="media-heading"><?php echo $author_name ?></h4>
											<h4 class="media-info"><small><span class="glyphicon glyphicon-calendar"></span>
													<?php
						                            $date= new DateTime($post["date"]);
						                            echo $date->format("M j, Y");
						                            ?></small>
						                      </h4>
											<p><?php echo $comment['content'] ?></p>
										</div>
								</li>
							<?php endforeach ?>
						<?php endif ?>
						
						<li class="media">
							<div class="media-body">
								<a href="#">Load more comments...</a>
							</div>
						</li>

					</ul>
				</div>
				<?php endif; ?>
			</div>
		</div>

		<div class="col-xs-12 col-md-3 ">
			<!-- Search box-->
			<?php if ( is_user_login() ): ?>
					<?php if ( $user_status ): ?>
							You are blocked by Admin.
					<?php else: ?>
		            <!-- Search box-->
			            <?php include("search_box.php"); ?>
			            <?php include("categories_box.php"); ?>
			            <?php include("popular_ideas_box.php"); ?>
		   			<?php endif; ?>
   			<?php else : ?>
	            <!-- Search box-->
		            <?php include("search_box.php"); ?>
		            <?php include("categories_box.php"); ?>
		            <?php include("popular_ideas_box.php"); ?>
			<?php endif ?>
		</div>
	</div>
</div>
<?php post_views( $post_id ); ?>
<?php } else { ?>
	<h1 style="text-align: center;font-weight: bolder;color: red;">404 Page not found</h1>
<?php } ?>
<?php endif ?>

<?php 
	include("footer.php");
?>

