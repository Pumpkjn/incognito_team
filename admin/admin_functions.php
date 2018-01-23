<?php
function check_exist_term( $slug )
{
	$conn = new database();
	$sql = 'SELECT * FROM product_types
			WHERE slug = "'.$slug.'"';
	$results = $conn->select_query($sql);
	if ( $results ) {
		$check = true;
	} else {
		$check = false;
	}

	return $check;
}

function slugify($text)
{
  // replace non letter or digits by -
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, '-');

  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}

function get_terms() 
{
	$conn = new database();
	$sql = 'SELECT * FROM product_types';
	$results = $conn->select_all_query($sql);

	return $results;
}

function get_user_name( $user_id ) {
  $conn = new database();
  $sql = 'SELECT * FROM users WHERE id='. $user_id;
  $results = $conn->select_query($sql);

  return $results['tendangnhap'];
}

function selected( $value ) {

    $selected = '';

    $select = isset( $_REQUEST['lh'] ) ? $_REQUEST['lh'] : null;
    if ( $select == $value ) {
      $selected = 'selected';
    }

    return $selected;
  }