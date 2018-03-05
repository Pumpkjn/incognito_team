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

    function get_dep_by_id( $dep_id ) {
        global $database;
        $sql = "SELECT * From deps WHERE id=".$dep_id;
        $result = $database->select_all_query( $sql );
        return $result[0];
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

    function delete_deps( $id ) {
        global $database;
        $sql = 'DELETE FROM deps WHERE id = "'.$id.'"';
        $database->execute_query( $sql );
    }

    function get_all_available_request_idea( $deps ) {
        global $database;
        $sql = 'SELECT * from deps INNER JOIN open_subs ON open_subs.dep_id = deps.id WHERE open_subs.status = 1 AND deps.id='.$deps;
        $result = $database->select_all_query( $sql );
        return $result;
    }

}
$GLOBALS['deps'] = new DEPS();