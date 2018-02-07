	<?php
	require_once("classes/_Ideals.php");
	require_once("classes/_deps.php");
	require_once("classes/_user.php");
	function login_form() { ?>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h4 class="modal-title" id="login-modal-label">Login</h4>
					<form method="POST" action="modules/login.php">
						<div class="form-group">
							<label for="">Email</label>
							<input type="text" class="form-control" id="email" placeholder="email">
						</div>
						<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
							<input type="password" class="form-control" id="password" placeholder="password">
					</div>
					</form>
					<div id="warning-info" class="text-warning"></div>
					<button type="button" id="modal-login-button" class="btn btn-primary">Login</button>
				</div>
			</div>
		</div>
		<?php }
	
