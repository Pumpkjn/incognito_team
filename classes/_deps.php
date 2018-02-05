<?php

class DEPS
{
    public function __construct()
    {
        
    }

    function get_all_department() {
    	global $database;
		$sql = "SELECT * From deps";
		$result = $database->select_all_query( $sql );
		return $result;
    }

    function _insert_deps( $name ) {
    	global $database;
    	$sql = "INSERT INTO deps( `name`  )
			VALUES ('" . $name . "')";
    	$result = $database->execute_query_return_result( $sql );
    	return $result;
    }

    function add_deps( $name, $thumbnail ) {
    	$deps = $this->_insert_deps( $name );
    	$this->add_deps_meta( $deps, 'thumbnail', $thumbnail );
    }

    // metadata

    function add_deps_meta( $id, $key, $value ) {
    	global $database;
    	$sql = "INSERT INTO deps_data( `dep_id`, `meta_key`, `meta_value`  )
			VALUES ('" . $id . "', '" . $key . "', '" . $value . "')";
		$database->execute_query( $sql );
    }

    function get_deps_meta( $id, $key, $plural ) {
    	global $database;
    	$sql = 'SELECT * FROM deps_data WHERE dep_id='.$id.' AND meta_key="'.$key.'"';
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
    		$res = false;
    	}
    	return $r;
    }





}
$GLOBALS['deps'] = new DEPS();