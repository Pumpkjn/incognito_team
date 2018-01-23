	<?php
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
function get_all_term() {
	$conn = new database();
	$sql = 'SELECT * FROM product_types';
	$results = $conn->select_all_query($sql);

	return $results;
}
function get_all_product() {
	$conn = new database();
	$sql = 'SELECT * FROM products';
	$results = $conn->select_all_query($sql);

	return $results;
}

function get_product( $product_id ) {
	$conn = new database();
	$sql = 'SELECT * FROM product_types p1 JOIN products p2 ON p2.loaihang = p1.id WHERE p2.id = '. $product_id;
	$results = $conn->select_query($sql);
	return $results;
}

function total_row_price( $dg, $sl ) 
{
	return intval( $dg ) * intval( $sl );
}

function get_products_by_term( $loaihang_id ) {
	$conn = new database();
	$sql = 'SELECT * FROM products WHERE loaihang='. $loaihang_id;
	$results = $conn->select_all_query($sql);

	return $results;
}

function get_term_name_by_term( $loaihang_id ) {
	$conn = new database();
	$sql = 'SELECT * FROM product_types WHERE id='. $loaihang_id;
	$results = $conn->select_query($sql);

	return $results['term_name'];
}

function get_relate_term_by_term( $loaihang_id ) {
	$conn = new database();
	$sql = 'SELECT * FROM product_types WHERE id!="'. $loaihang_id .'" ORDER BY RAND() LIMIT 3 ';
	$results = $conn->select_all_query($sql);

	return $results;
}

function get_quantity_by_product_id( $id ) {
	$conn = new database();
	$sql = 'SELECT * FROM products WHERE id='. $id;
	$results = $conn->select_query($sql);

	return $results['soluong'];
}

function update_product_quantity( $id, $quantity ) {
	$conn = new database();
	$sql = 'UPDATE products SET soluong="'.$quantity.'" WHERE id = "'.$id.'"';
	$conn->execute_query( $sql );
}

function update_product_bill( $user_id, $all_products ) {
	$date = date("Y-m-d H:i:s");
	$products_info = serialize( $all_products );
	$conn = new database();
	$sql = "INSERT INTO analysis( `user_id` , `date`, `bill` )
	VALUES ('" . $user_id . "','" . $date . "','".$products_info."')";
	$conn->execute_query( $sql );
}

function get_user_latest_bill( $user_id ) {
	$conn = new database();
	$sql = 'SELECT * FROM analysis WHERE user_id="'. $user_id.'" ORDER BY id DESC';
	$results = $conn->select_query($sql);

	return $results['id'];
}

function get_bill( $bill_id ) {
	$conn = new database();
	$sql = 'SELECT * FROM analysis WHERE id='. $bill_id;
	$results = $conn->select_query($sql);

	return $results;
}

function get_user_name( $user_id ) {
	$conn = new database();
	$sql = 'SELECT * FROM users WHERE id='. $user_id;
	$results = $conn->select_query($sql);

	return $results['user_name'];
}

function get_user_id( $name ) {
	$conn = new database();
	$sql = 'SELECT * FROM users WHERE user_name="'. $name.'"';
	$results = $conn->select_query($sql);

	return $results;
}

function get_comment( $product_id ) {
	$conn = new database();
	$sql = 'SELECT * FROM comment WHERE products_id="'. $product_id.'"';
	$results = $conn->select_all_query($sql);

	return $results;
}