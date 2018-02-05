<?php
class idea
{
	public function __construct()
    {
        // innitial
    }

	function get_all_ideas_by_category( $cat_id = null ) {
		global $database;
		$sql = "SELECT * FROM ideas
			JOIN categories_ideas ON ideas.id = categories_ideas.idea_id
			JOIN categories ON categories.id = categories_ideas.category_id";
		if ( $cat_id ) {
		  $sql .= " WHERE categories.id =" .$cat_id;
		}
		$result = $database->select_all_query( $sql );
		return $result;
	  }
	function get_all_category() {
		global $database;
		$sql = "SELECT * From categories";
		$result = $database->select_all_query( $sql );
		return $result;
	}
	
	function slugify($string, $replace = array(), $delimiter = '-') {
	  if (!extension_loaded('iconv')) {
		throw new Exception('iconv module not loaded');
	  }
	  // Save the old locale and set the new locale to UTF-8
	  $oldLocale = setlocale(LC_ALL, '0');
	  setlocale(LC_ALL, 'en_US.UTF-8');
	  $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
	  if (!empty($replace)) {
		$clean = str_replace((array) $replace, ' ', $clean);
	  }
	  $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
	  $clean = strtolower($clean);
	  $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
	  $clean = trim($clean, $delimiter);
	  // Revert back to the old locale
	  setlocale(LC_ALL, $oldLocale);
	  return $clean;
	}

	function get_category_by( $word, $type ) {
		global $database;
		if ( 'slug' == $type ) {
			$sql = 'SELECT * FROM categories WHERE slug="'.$word.'"';
		} else if ( 'name' == $type ) {
			$sql = 'SELECT * FROM categories WHERE name="'.$word.'"';
		}
		$result = $database->select_all_query( $sql );
		return $result;
	}

	function check_exist( $word, $type ) {
		$result = $this->get_category_by( $word, $type );
		if ( $result ) {
			return true;
		} else {
			return false;
		}
	}

	function add_category( $word ) {
		global $database;
		$check = $this->check_exist( $word, 'name' );
		if ( $check ) {
			header('Location: ../addcategory.php?status=error&code=exist');
			exit();
		} else {
			$slug = $this->slugify( $word );
			$sql = "INSERT INTO categories( `name` , `slug` )
			VALUES ('" . $word . "','".$slug."')";
			$database->execute_query( $sql );
		}
	}

	function delete_category( $cat_id ) {
		global $database;
		$sql = 'DELETE FROM categories WHERE id = "'.$cat_id.'"';
		$database->execute_query( $sql );
	}
}
$GLOBALS['idea'] = new idea();