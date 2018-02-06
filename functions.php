	<?php
	require_once("classes/_Ideals.php");
	require_once("classes/_deps.php");
	function login_form() { ?>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h4 class="modal-title" id="login-modal-label">Login</h4>
					<form>
					<div class="form-group">
						<label for="">User Name</label>
						<input type="text" class="form-control" id="user_name" placeholder="Tên đăng nhập">
					</div>
					<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" id="password" placeholder="Mật khẩu">
					</div>
					</form>
					<div id="warning-info" class="text-warning"></div>
					<button type="button" id="modal-login-button" class="btn btn-primary">Login</button>
				</div>
			</div>
		</div>
		<?php }
	
