<?php
	require_once("database.php");
	require_once("functions.php");
	include("header.php");
	$current_tab = 'submit-idea';
	include("top_nav.php");
	global $deps,$idea;
?>
	<div class="container submit-container main-container">
		<div class="row">
			<div class="col-xs-12 col-md-9">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    <h4>Submit idea</h4>
	                </div>
					<div class="panel-body">
						<?php if ( is_user_login() ) { ?>
						<form method="POST" action="modules/add_idea.php" class="form-horizontal">
							<div class="form-group title-group">
								<label class="col-sm-3" for="">Title</label>
								<div class="col-sm-9 title-input">
									<input type="text" name="idea-name" class="form-control" placeholder="Title" id="idea-title">
								</div>
							</div>
							<div class="form-group desc-group">
								<label class="col-sm-3" for="idea-description">Description</label>
								<div class="col-sm-9 desc-input">
									<textarea name="idea-description" class="form-control" style="width: 100%" rows="5" id="idea-desc"></textarea>
								</div>
							</div>
							<!-- the topic and department can be show when access from linh with query parameters/ improve -->
							<?php
							$selected_deparment = isset( $_GET['dep'] ) ? $_GET['dep'] : null;
							$departments = $deps->get_all_department();
							if ( $departments ) { ?>
							<div class="form-group">
								<label class="col-sm-3" for="department">Choose Department</label>
								<div class="col-sm-4">
									<select name="department" id="idea-dep" class="form-control" data-action="dep-change">
										<?php $first_topic = $departments[0]; ?>
										<?php foreach ( $departments as $d ) { ?>
											<option value="<?php echo $d['id'] ?>" <?php if ( $selected_deparment ) { echo is_selected( $selected_deparment, $d['id'] );
											} ?>><?php echo $d['name'];  ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group topic-group">
								<label class="col-sm-3" for="department">Topic</label>
								<?php
									if ( $selected_deparment ) {
										$topics = $deps->get_all_available_request_idea( $selected_deparment );
									} else {
										$topics = $deps->get_all_available_request_idea( $first_topic['id'] );
									}
								?>
								<?php if ( $topics ): ?>
									<?php $selected_topic = isset( $_GET['topic'] ) ? $_GET['topic'] : null; ?>
									<div class="col-sm-4 topic-input" id="topic-change-container">
										<select name="topic" id="topic" class="form-control">
											<?php foreach ( $topics as $topic ) { ?>
												<option value="<?php echo $topic['id'] ?>" <?php if ( $selected_deparment ) { echo is_selected( $selected_topic, $topic['id'] );
											} ?>><?php echo $topic['title'] ?></option>
											<?php } ?>
										</select>
									</div>
								<?php else: ?>
									<div class="col-sm-4" id="topic-change-container">
										<h5>No topic available.</h5>
									</div>
								<?php endif ?>
								
							</div>
							<?php } ?>
							<!-- -->
							<div class="form-group">
								<label class="col-sm-3" for="category">Choose Categories</label>
								</br>
								<?php
									$category = $idea->get_all_category();
								?>
								<div class="col-sm-4">
									<select name="category[]" multiple id="idea-cat" class="form-control">
										<?php foreach ( $category as $c ) { ?>
											<option value="<?php echo $c['id'] ?>"><?php echo $c['name'] ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3" for="attachment">Attachment</label>
								<div class="col-sm-9">
									<input type="file" name="attachment" class="form-control" accept=".zip,.rar,.doc,.docx,.mp4,.mp3,.mpeg,.txt,.xlsx,.xml,.sql" id="idea-attachment" multiple></input>
								</div>
							</div>

							<div class="form-group">
								<label class="form-check-label col-sm-3" for="term">Terms And Conditions</label>
								<div class="col-sm-9">
									<input type="checkbox" class="form-check-input" name="term-condition" id="term-condition-check">
								</div>
							</div>
							
							<div class="form-group">
								<label class="form-check-label col-sm-3" for="term">Submit as Anonymous</label>
								<div class="col-sm-9">
									<input type="checkbox" class="form-check-input" name="term-condition" id="anonymous-submit">
								</div>
							</div>
								
							<?php $current_user = $user->get_current_user(); ?>
								
								<input type="hidden" id="user-id" value="<?php echo $current_user['id']; ?>">
							<button id="idea-submit" type="submit" class="btn btn-primary submit-button">Submit</button>
						</form>
						<?php } else { ?>
							<div class="alert alert-info" role="alert">
							 	You need to <a href="login.php">login</a> to submit ideas.
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-3">
            <!-- Search box-->
	            <?php include("search_box.php"); ?>
	            <?php include("categories_box.php"); ?>
	            <?php include("popular_ideas_box.php"); ?>
        	</div>
		</div>
	</div>

<?php 
	include("footer.php");
?>
