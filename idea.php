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

?>
	<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-9">
			<!-- the start of an idea -->
			<div class="panel panel-default">
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
									if ( $user_department == $idea_department || $_SESSION['role'] == '0' ) { ?>
										<h5 style="display: inline-block;">
										| <a href="admin/modules/admin_delete_idea.php?id=<?php echo $i['id'] ?>"> Delete </a> 
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
									if ( $user_department == $idea_department || $_SESSION['role'] == '0' ) { 
										$attachment = $idea->get_idea_meta( $post_id, 'attachment_dir', false );
										?>
										<?php if ( $attachment && $attachment != '' ): ?>
											<div id="attachment-container">
												<a href="admin/modules/download_package.php?idea=4&amp;package=4_5a9d8fcf557ec" class="download-attachment">Download Attachment <i class="glyphicon glyphicon-download-alt" aria-hidden="true"></i></a>
											</div>
										<?php endif ?>
										
									<?php }
								?>
								
							<?php endif ?>
						<?php endif ?>
				<div class="panel-footer">
					<ul class="list-inline pull-left">
						<li>
							<a href="javascript:void(0)" id="action-thumb-up" data-postid="<?php echo $post_id ?>" >
								<span class="glyphicon glyphicon-thumbs-up"></span>
								<span> 5 </span>
							</a>
						</li>
						<li>|</li>
						<li>
							<a href="javascript:void(0)" id="action-thumb-down" data-postid="<?php echo $post_id ?>" >
								<span class="glyphicon glyphicon-thumbs-down"></span>
								<span> 11 </span>
							</a>
						</li>
						<li>|</li>
						<li>
							<a href="#">
								<span class="glyphicon glyphicon-comment"></span>
								<span>2 comments</span>
							</a>
					</ul>
					<ul class="list-inline pull-right">
						<li>
							<span class="glyphicon glyphicon-calendar"></span>
							2 days, 8 hours ago
						</li>
						<li>|</li>
						<li>
							<span class="glyphicon glyphicon-user"></span>
							by
							<a href="#">
								John
							</a>
						</li>
					</ul>
					<div class="clearfix"></div>
					<div class="divider"></div>
					<ul class="media-list">
						<!--                            submit comment-->
						<li class="media">
							<div class="media-left pull-left arrow-media-left">
								<a href="#">
									<img class="media-object img-circle" src="assets/img/a1.png">
								</a>
							</div>
							<div class="media-body">
								<div class="media-content">
									<form>
										<div class="form-group">
											<textarea class="form-control" rows="3" placeholder="Comment"></textarea>
										</div>
										<input type="submit" class="btn btn-primary">
									</form>

								</div>

							</div>
						</li>
						<li class="media">
							<div class="media-left pull-left arrow-media-left">
								<a href="#">
									<img class="media-object img-circle" src="assets/img/a1.png" >
								</a>
							</div>
							<div class="media-body">
								<div class="media-content">
									<h4 class="media-heading">Nguyen Vu</h4>
									<h4 class="media-info"><small><span class="glyphicon glyphicon-calendar"></span>
											2 days, 8 hours ago</small></h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi impedit ipsam nobis recusandae repudiandae. Ab deleniti dolorem dolorum, facilis laboriosam magnam officia omnis optio quas reprehenderit, saepe sint tempore voluptas.</p>
									<div class="divider"></div>
									<ul class="list-inline ">
										<li>
											<a>
												<span class="glyphicon glyphicon-thumbs-up"></span>
												<span> 5 </span>
											</a>
										</li>
										<li>|</li>
										<li>
											<a>
												<span class="glyphicon glyphicon-thumbs-down"></span>
												<span> 11 </span>
											</a>
										</li>
										<li>|</li>
										<li>
											<a >
												<span class="glyphicon glyphicon-comment"></span>
												<span>2 comments</span>
											</a>
									</ul>
								</div>
								<div class="comment-box" id="idea-comments-2">
									<div class="media">
										<div class="media-left pull-left arrow-media-left">
											<a href="#">
												<img class="media-object img-circle" src="assets/img/a2.png" >
											</a>
										</div>
										<div class="media-body">
											<div class="media-content">
												<h4 class="media-heading">Nguyen Vu</h4>
												<h4 class="media-info"><small><span class="glyphicon glyphicon-calendar"></span>
														2 days, 8 hours ago</small></h4>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi impedit ipsam nobis recusandae repudiandae. Ab deleniti dolorem dolorum, facilis laboriosam magnam officia omnis optio quas reprehenderit, saepe sint tempore voluptas.</p>
												<div class="divider"></div>
												<ul class="list-inline ">
													<li>
														<a>
															<span class="glyphicon glyphicon-thumbs-up"></span>
															<span> 5 </span>
														</a>
													</li>
													<li>|</li>
													<li>
														<a>
															<span class="glyphicon glyphicon-thumbs-down"></span>
															<span> 11 </span>
														</a>
													</li>
													<li>|</li>
													<li>
														<a href="#comment-box-1">
															<span class="glyphicon glyphicon-comment"></span>
															<span>2 comments</span>
														</a>
												</ul>
											</div>
										</div>
									</div>
								</div>

						</li>
						<li class="media">
							<div class="media-left pull-left arrow-media-left">
								<a href="#">
									<img class="media-object img-circle" src="assets/img/a3.png" >
								</a>
							</div>
							<div class="media-body">
								<div class="media-content">
									<h4 class="media-heading">Nguyen Vu</h4>
									<h4 class="media-info"><small><span class="glyphicon glyphicon-calendar"></span>
											2 days, 8 hours ago</small></h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi impedit ipsam nobis recusandae repudiandae. Ab deleniti dolorem dolorum, facilis laboriosam magnam officia omnis optio quas reprehenderit, saepe sint tempore voluptas.</p>
									<div class="divider"></div>
									<ul class="list-inline ">
										<li>
											<a>
												<span class="glyphicon glyphicon-thumbs-up"></span>
												<span> 5 </span>
											</a>
										</li>
										<li>|</li>
										<li>
											<a>
												<span class="glyphicon glyphicon-thumbs-down"></span>
												<span> 11 </span>
											</a>
										</li>
										<li>|</li>
										<li>
											<a href="#comment-box-1">
												<span class="glyphicon glyphicon-comment"></span>
												<span>2 comments</span>
											</a>
									</ul>
								</div>
							</div>
						</li>
						<li class="media">
							<div class="media-body">
								<a href="#">Load more comments...</a>
							</div>
						</li>

					</ul>


				</div>
			</div>
		</div>

		<div class="col-xs-12 col-md-3 ">
			<!-- Search box-->
			<?php include "search_box.php"; ?>
			<?php include "categories_box.php"; ?>
			<?php include "popular_ideas_box.php"; ?>
		</div>
	</div>
</div>
<?php post_views( $post_id ); ?>
<?php endif ?>

