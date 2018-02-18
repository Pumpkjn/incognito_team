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
				<input type="file" name="attachment" accept=".zip,.rar" id="idea-attachment"></input>
			</div>

			<div class="form-check">
				<input type="checkbox" class="form-check-input" name="term-condition" id="term-condition-check">
				<label class="form-check-label" for="term">Terms And Conditions</label>
			</div>
			<?php if ( !is_user_login() ) { ?>
				<div class="submit-login row">
						<h3> Submit as Anonymous </h3>
						<div class="form-group">
							<label for="">Name</label>
							<input type="text" name="user-name" class="form-control" placeholder="User Name" id="user-name">
						</div>

						<div class="form-group email-group">
							<label for="">Email</label>
							<input type="text" name="user-email" class="form-control" placeholder="User email" id="user-email">
						</div>
				</div>
			<?php } else { 
				$current_user = $user->get_current_user();
				?>
				<input type="hidden" id="user-id" value="<?php echo $current_user['id']; ?>">
			<?php } ?>
			<button id="idea-submit" type="submit" class="btn btn-primary submit-button">Submit</button>
		</form>
	</div>

<?php 
	include("footer.php");
?>