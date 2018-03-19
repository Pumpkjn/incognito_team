<?php
class idea
{
	public function __construct()
    {
        // innitial
    }

    function get_all_ideas() {
    	global $database;
    	$sql = "SELECT * FROM ideas";
    	$result = $database->select_all_query( $sql );
		return $result;
    }

    function get_popular_ideas() {
    	global $database;
    	$sql = "SELECT DISTINCT ideas.id FROM ideas INNER JOIN ideas_metadata ON ideas.id = ideas_metadata.idea_id ORDER BY FIELD( ideas_metadata.meta_value , 'views' ) DESC LIMIT 5";
    	$result = $database->select_all_query( $sql );
		return $result;
    }

    function get_idea_by_id( $idea_id ) {
		global $database;
		$sql = "SELECT * From ideas WHERE id=".$idea_id;
		$result = $database->select_all_query( $sql );
		return $result[0];
	}

	function get_all_ideas_by_category( $cat_id = null ) {
		global $database;
		$sql = "SELECT * FROM ideas
			INNER JOIN categories_ideas ON ideas.id = categories_ideas.idea_id
			INNER JOIN categories ON categories.id = categories_ideas.category_id";
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
		$sql = "SELECT * FROM categories WHERE $type='$word'";
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

	function insert_idea( $array ) {
		$userID = $array['userID'];
		$new_idea = $this->_insert_idea( $userID );

		$categories = explode( ',', $array['cat'] );
		$this->add_idea_to_category( $new_idea, $categories );
		$this->add_idea_meta( $new_idea, 'title', $array['title'] );
		$this->add_idea_meta( $new_idea, 'desc', $array['desc'] );
		$this->add_idea_meta( $new_idea, 'dep', $array['dep'] );
		$this->add_idea_meta( $new_idea, 'topic', $array['topic'] );
		$this->add_idea_meta( $new_idea, 'views', 0 );
		$this->add_idea_meta( $new_idea, 'thumbup', null );
		$this->add_idea_meta( $new_idea, 'thumbdown', null );
		$this->add_idea_meta( $new_idea, 'anonymousSubmit', $array['anonymousSubmit'] );
		if ( count( $array['attachment'] ) > 0 ) {
			$this->upload_attachment( $new_idea , $array['attachment'] );
		}
		return $new_idea;
	}

	function upload_attachment( $new_idea , $attachments ) {
		$folder = uniqid( $new_idea.'_' );
		$uploads_dir = '../uploads/'.$folder;
		if ( !file_exists( $uploads_dir ) ) {
		    mkdir( $uploads_dir, 0777, true );
		}
		foreach ( $attachments as $attachment) {
			if ( $attachment['error'] == 0 ) {
				$tmp_name = $attachment['tmp_name'];
				$name = basename( $attachment['name'] );
				$target = $uploads_dir.'/'.$name;
				move_uploaded_file( $tmp_name, $target );
			}
		}
		$this->add_idea_meta( $new_idea, 'attachment_dir', $uploads_dir );
	}

	function add_idea_to_category( $idea, $categories ) {
		global $database;
		foreach ( $categories as $cat ) {
			$sql = "INSERT INTO categories_ideas( `idea_id`, `category_id` )
			VALUES ('" . $idea . "', '" . $cat . "')";
			$database->execute_query( $sql );
		}
	}

	function _insert_idea( $userID ) {
		global $database;
    	$sql = "INSERT INTO ideas( `user_id`, `date`  )
			VALUES ('" . $userID . "', '" . date("Y-m-d H:i:s") . "')";
    	$result = $database->execute_query_return_result( $sql );
    	return $result;
	}

	function add_idea_meta( $id, $key, $value ) {
		global $database;
    	$sql = "INSERT INTO ideas_metadata( `idea_id`, `meta_key`, `meta_value`  )
			VALUES ('" . $id . "', '" . $key . "', '" . $value . "')";
		$database->execute_query( $sql );
	}

	function get_idea_meta( $id, $key, $plural ) {
		global $database;
    	$sql = 'SELECT * FROM ideas_metadata WHERE idea_id='.$id.' AND meta_key="'.$key.'"';
    	$result = $database->select_all_query( $sql );
    	if ( $result ) {
    		if ( $plural ) {
    			foreach ( $result as $res ) {
    				$r[] = $res['meta_value'];
    			}
    		} else {
    			$res = $result[0];
    			$r = $res['meta_value'];
    		}
    		
    	} else {
    		$r = false;
    	}
    	return $r;
	}

	function update_idea_meta( $id, $key, $value ) {
		global $database;
    	$sql = 'UPDATE ideas_metadata SET meta_value = "'.$value.'"  WHERE idea_id = '.$id.' AND meta_key = "'.$key.'"';
    	$database->execute_query( $sql );
	}
	

	function get_categories( $idea_id ) {
		global $database;
		$sql = "SELECT * FROM categories
			INNER JOIN categories_ideas ON categories.id = categories_ideas.category_id
			INNER JOIN ideas ON ideas.id = categories_ideas.idea_id
			WHERE ideas.id =".$idea_id;
		$result = $database->select_all_query( $sql );
		return $result;
	}

	function delete_idea( $idea_id ) {
		global $database;
		$sql = 'DELETE FROM ideas WHERE id = "'.$idea_id.'"';
		$database->execute_query( $sql );
	}

	function get_all_idea_from_topic( $topic_id ) {
		global $database;
		$sql = 'SELECT * FROM ideas_metadata INNER JOIN ideas ON ideas.id = ideas_metadata.idea_id  WHERE ideas_metadata.meta_key ="topic" AND ideas_metadata.meta_value = "'.$topic_id.'"  ORDER BY ideas.date DESC LIMIT '.$limit;
		$result = $database->select_all_query( $sql );
		return $result;
	}

	function get_idea_from_topic( $topic_id, $limit = 1 ,$paged = null ) {
		global $database;
		$sql = 'SELECT * FROM ideas_metadata INNER JOIN ideas ON ideas.id = ideas_metadata.idea_id  WHERE ideas_metadata.meta_key ="topic" AND ideas_metadata.meta_value = "'.$topic_id.'"  ORDER BY ideas.date DESC LIMIT '.$limit;
		if ( $paged ) {
			$sql += ' OFFSET 5';
		}
		$result = $database->select_all_query( $sql );
		return $result;
	}

	function get_idea_categories( $idea_id ) {
		global $database;
		$sql = 'SELECT * FROM categories_ideas INNER JOIN ideas ON categories_ideas.idea_id = ideas.id INNER JOIN categories ON categories_ideas.category_id = categories.id WHERE ideas.id=' .$idea_id;
		$result = $database->select_all_query( $sql );
		return $result;
	}

	function update_vote( $post, $user, $action ) {
		$thumbup = $this->get_idea_meta( $post, 'thumbup', false );
		$thumbdown = $this->get_idea_meta( $post, 'thumbdown', false );
		switch ( $action ) {
			case 'thumb-up':
				$down = array();
				$down = array();
				if ( $thumbdown && $thumbdown != '' ) {
					$thumbdown_arr = explode( ',' , $thumbdown );
					if ( in_array( $user , $thumbdown_arr ) ) {
						$remove = array_search( $user , $thumbdown_arr );
						if ( $remove !== false ) {
							unset($thumbdown_arr[ $remove ]);
						}
						$down = $thumbdown_arr;
						$down = implode( ',', $down );
						// remove thumb_down user
						$this->update_idea_meta( $post, 'thumbdown', $down );
						if ( !$thumbup || $thumbup == '' ) {
							$up[] = $user;
						} else {
							$thumbup_arr = explode( ',' , $thumbup );
							$thumbup_arr[] = $user;
							$blank = array_search( '', $thumbup_arr );
							if ( $blank !== false) {
								unset( $thumbup_arr[ $blank ]);
							}
							$up = $thumbup_arr;
						}
					} else {
						if ( !$thumbup || $thumbup == '' ) {
							$up[] = $user;
						} else {
							$thumbup_arr = explode( ',' , $thumbup );
							$thumbup_arr[] = $user;
							$blank = array_search( '', $thumbup_arr );
							if ( $blank !== false ) {
								unset( $thumbup_arr[ $blank ]);
							}
							$up = $thumbup_arr;
						}
					}
				} else if ( !$thumbup || $thumbup == '' ) {
					$up[] = $user;
				} else {
					$thumbup_arr = explode( ',' , $thumbup );
					if ( !in_array( $user , $thumbup_arr ) ) {
						$thumbup_arr[] = $user;
					} else {
						die();
					}
					$up = $thumbup_arr;
				}
				$blank = array_search( '', $up );
				if ( $blank !== false ) {
					unset( $up[ $blank ]);
				}
				$up = implode( ',', $up );
				$this->update_idea_meta( $post, 'thumbup', $up );
				break;

			case 'thumb-down':
				$up = array();
				$down = array();
				if ( $thumbup && $thumbup != '' ) {
					$thumbup_arr = explode( ',' , $thumbup );

					if ( in_array( $user , $thumbup_arr ) ) {
						$remove = array_search( $user , $thumbup_arr );
						if ( $remove !== false ) {
							unset($thumbup_arr[ $remove ]);
						}
						$up = $thumbup_arr;
						$up = implode( ',', $up );
						// remove thumb_up user
						$this->update_idea_meta( $post, 'thumbup', $up );
						if ( !$thumbdown || $thumbdown == '' ) {
							$down[] = $user;
						} else {
							$thumbdown_arr = explode( ',' , $thumbdown );
							$thumbdown_arr[] = $user;
							$blank = array_search( '', $thumbdown_arr );
							if ( $blank !== false ) {
								unset( $thumbdown_arr[ $blank ]);
							}
							$down = $thumbdown_arr;
						}
					} else {
						if ( !$thumbdown || $thumbdown == '' ) {
							$down[] = $user;
						} else {
							$thumbdown_arr = explode( ',' , $thumbdown );
							$thumbdown_arr[] = $user;
							$blank = array_search( '', $thumbdown_arr );
							if ( $blank !== false ) {
								unset( $thumbdown_arr[ $blank ]);
							}
							$down = $thumbdown_arr;
						}
					}
				} else if ( !$thumbdown || $thumbdown == '' ) {
					$down[] = $user;
				} else {
					$thumbdown_arr = explode( ',' , $thumbdown );
					if ( !in_array( $user , $thumbdown_arr ) ) {
						$thumbdown_arr[] = $user;
					} else {
						die();
					}
					$down = $thumbdown_arr;
				}
				$blank = array_search( '', $down );
				if ( $blank !== false ) {
					unset( $down[ $blank ]);
				}
				$down = implode( ',', $down );
				$this->update_idea_meta( $post, 'thumbdown', $down );
				break;
		}
	}
}
$GLOBALS['idea'] = new idea();