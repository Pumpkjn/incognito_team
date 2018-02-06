<?php
	require_once("database.php");
	require_once("functions.php");
	include("header.php");
	include("/templates/top_nav.php");
	global $deps,$ideal;
?>

	<div class="container submit-container">
		<h2> Submit Idea </h2>
		<form method="POST" action="modules/add_idea.php">
			<div class="form-group">
				<label for="">Title</label>
				<input type="text" name="idea-name" class="form-control" placeholder="Title">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Description</label>
				</br>
				<textarea name="idea-description" style="width: 100%" rows="5"></textarea>
			</div>
			<div class="form-group">
				<?php
					$departments = $deps->get_all_department();
				?>
				<label for="exampleInputPassword1">Choose Department</label>
				</br>
				<select name="department">
					<?php foreach ( $departments as $d ) { ?>
						<option value="<?php echo $d['id'] ?>"><?php echo $d['name'] ?></option>
					<?php } ?>
				</select>
				</br>
				
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Choose Categories</label>
				</br>
				<?php
					$category = $idea->get_all_category();
				?>
				<select name="category[]" multiple>
					<?php foreach ( $category as $c ) { ?>
						<option value="<?php echo $c['id'] ?>"><?php echo $c['name'] ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Attachment</label>
				</br>
				<input type="file" name="attachment" accept=".zip,.rar"></input>
			</div>

			<div class="form-check">
				<input type="checkbox" class="form-check-input" name="term-condition" id="term">
				<label class="form-check-label" for="term">Term And Condition</label>
			</div>

			<div class="submit-login row">
				<div class="col-md-8">
					<h3> Submit as Anonymous </h3>
					<div class="form-group">
						<label for="">Name</label>
						<input type="text" name="user-name" class="form-control" placeholder="User Name">
					</div>

					<div class="form-group">
						<label for="">Email</label>
						<input type="text" name="user-email" class="form-control" placeholder="User email">
					</div>
				</div>
				<div class="col-md-4">
					<h3>Or Login</h3>
					<div><a class="login-anchor" href="#"> Login </a></div>
					
				</div>
			</div>
			<button type="submit" class="btn btn-primary submit-button">Submit</button>
		</form>
	</div>

<?php 
	include("footer.php");
?>