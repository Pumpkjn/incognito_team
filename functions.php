	<?php
	require_once("classes/_Ideas.php");
	require_once("classes/_deps.php");
	require_once("classes/_user.php");

	function get_active_tab( $current, $tab ) {
		$current = isset( $current) ? $current : 'dashboard';
		if ( $current == $tab ) {
			return 'active';
		} else {
			return '';
		}
	}
	function login_form() { ?>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h4 class="modal-title" id="login-modal-label">Login</h4>
					<form method="POST" action="modules/login.php">
						<div class="form-group">
							<label for="">Email</label>
							<input type="text" class="form-control" name="email" id="email" placeholder="email">
						</div>
						<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
							<input type="password" class="form-control" name="password" id="password" placeholder="password">
						</div>
						<div id="warning-info" class="text-warning"></div>
						<button type="submit" class="btn btn-default">Login</button>
					</form>
					
				</div>
			</div>
		</div>
		<?php }

	function is_user_login() {
		if (session_status() == PHP_SESSION_NONE) {
		    session_start();
		}
		$login = isset( $_SESSION['login'] ) ? $_SESSION['login'] : null;
		if ( $login ) {
			return true;
		} else {
			return false;
		}
	}

	function current_user_can_manage() {
		if (session_status() == PHP_SESSION_NONE) {
		    session_start();
		}
		$can = false;
		if ( is_user_login() ) {
			global $user;
			$role = $_SESSION['role'];
			switch ( $role ) {
				case 0:
					$can = true;
					break;

				case 1:
					$can = false;
					break;

				case 2:
					$can = false;
					break;
				
				default:
					$can = false;
					break;
			}
		}
		return $can;
	}
	
