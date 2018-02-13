<?php
	require_once("database.php");
	require_once("functions.php");
	include("header.php");
	$current_tab = 'submit';
	include("/templates/top_nav.php");
	global $deps,$idea;
?>

	<div class="container submit-container">
		<h2> Submit Idea </h2>
		<?php if ( is_user_login() ) { ?>
		<form method="POST" action="modules/add_idea.php">
			<div class="form-group title-group">
				<label for="">Title</label>
				<input type="text" name="idea-name" class="form-control" placeholder="Title" id="idea-title">
			</div>
			<div class="form-group desc-group">
				<label for="idea-description">Description</label>
				</br>
				<textarea name="idea-description" style="width: 100%" rows="5" id="idea-desc"></textarea>
			</div>
			<div class="form-group">
				<?php
					$departments = $deps->get_all_department();
				?>
				<label for="department">Choose Department</label>
				</br>
				<select name="department" id="idea-dep">
					<?php foreach ( $departments as $d ) { ?>
						<option value="<?php echo $d['id'] ?>"><?php echo $d['name'] ?></option>
					<?php } ?>
				</select>
				</br>
				
			</div>
			<div class="form-group">
				<label for="category">Choose Categories</label>
				</br>
				<?php
					$category = $idea->get_all_category();
				?>
				<select name="category[]" multiple id="idea-cat">
					<?php foreach ( $category as $c ) { ?>
						<option value="<?php echo $c['id'] ?>"><?php echo $c['name'] ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label for="attachment">Attachment</label>
				</br>
				<input type="file" name="attachment" accept=".png,.jpeg,.jpg,.gif,.pdf,.zip,.rar,.doc,.docx,.mp4,.mp3,.mpeg,.txt,.xlsx,.xml,.sql" id="idea-attachment" multiple></input>
			</div>

			<div class="form-check">
				<input type="checkbox" class="form-check-input" name="term-condition" id="term-condition-check">
				<label class="form-check-label" for="term">Terms And Conditions</label>
			</div>
			
			<div class="form-check">
				<input type="checkbox" class="form-check-input" name="term-condition" id="anonymous-submit">
				<label class="form-check-label" for="term">Submit as Anonymous</label>
			</div>
				
			<?php $current_user = $user->get_current_user(); ?>
				
				<input type="hidden" id="user-id" value="<?php echo $current_user['id']; ?>">
			<button id="idea-submit" type="submit" class="btn btn-primary submit-button">Submit</button>
		</form>
		<?php } else { ?>
			<div class="alert alert-info" role="alert">
			 	You need to <a ref="login.php">login</a> to submit ideas.
			</div>
		<?php } ?>
	</div>

<?php 
	include("footer.php");
?>