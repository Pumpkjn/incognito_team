	<?php
	require_once("classes/_Ideas.php");
	require_once("classes/_deps.php");
	require_once("classes/_user.php");
	require_once("classes/_sub.php");

	function get_active_tab( $current, $tab ) {
		$current = isset( $current) ? $current : 'dashboard';
		if ( $current == $tab ) {
			return 'active';
		} else {
			return '';
		}
	}

	function is_selected( $current, $option ) {
		if ( $current == $option ) {
			return 'selected';
		} else {
			return;
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

	function current_user_can_coor() {
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
					$can = true;
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

	function paginate($item_per_page, $current_page, $total_records, $total_pages, $page_url)
	{
	    $pagination = '';
	    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
	        $pagination .= '<ul class="pagination">';
	        
	        $right_links    = $current_page + 3; 
	        $previous       = $current_page - 3; //previous link 
	        $next           = $current_page + 1; //next link
	        $first_link     = true; //boolean var to decide our first link
	        
	        if($current_page > 1){
	            $previous_link = ($previous==0)?1:$previous;
	            $pagination .= '<li class="first"><a href="'.$page_url.'?page=1" title="First">&laquo;</a></li>'; //first link
	            $pagination .= '<li><a href="'.$page_url.'?page='.$previous_link.'" title="Previous">&lt;</a></li>'; //previous link
	                for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
	                    if($i > 0){
	                        $pagination .= '<li><a href="'.$page_url.'?page='.$i.'">'.$i.'</a></li>';
	                    }
	                }   
	            $first_link = false; //set first link to false
	        }
	        
	        if($first_link){ //if current active page is first link
	            $pagination .= '<li class="first active">'.$current_page.'</li>';
	        }elseif($current_page == $total_pages){ //if it's the last active link
	            $pagination .= '<li class="last active">'.$current_page.'</li>';
	        }else{ //regular current link
	            $pagination .= '<li class="active">'.$current_page.'</li>';
	        }
	                
	        for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
	            if($i<=$total_pages){
	                $pagination .= '<li><a href="'.$page_url.'?page='.$i.'">'.$i.'</a></li>';
	            }
	        }
	        if($current_page < $total_pages){ 
	                $next_link = ($i > $total_pages)? $total_pages : $i;
	                $pagination .= '<li><a href="'.$page_url.'?page='.$next_link.'" >&gt;</a></li>'; //next link
	                $pagination .= '<li class="last"><a href="'.$page_url.'?page='.$total_pages.'" title="Last">&raquo;</a></li>'; //last link
	        }
	        
	        $pagination .= '</ul>'; 
	    }
	    return $pagination; //return pagination links
	}

		function ajax_paginate($item_per_page, $current_page, $total_records, $total_pages, $page_url)
	{
	    $pagination = '';
	    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
	        $pagination .= '<ul class="pagination">';
	        
	        $right_links    = $current_page + 3; 
	        $previous       = $current_page - 3; //previous link 
	        $next           = $current_page + 1; //next link
	        $first_link     = true; //boolean var to decide our first link
	        
	        if($current_page > 1){
	            $previous_link = ($previous==0)?1:$previous;
	            $pagination .= '<li class="first"><a href="'.$page_url.'?page=1" title="First">&laquo;</a></li>'; //first link
	            $pagination .= '<li><a href="'.$page_url.'?page='.$previous_link.'" title="Previous">&lt;</a></li>'; //previous link
	                for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
	                    if($i > 0){
	                        $pagination .= '<li><a href="'.$page_url.'?page='.$i.'">'.$i.'</a></li>';
	                    }
	                }   
	            $first_link = false; //set first link to false
	        }
	        
	        if($first_link){ //if current active page is first link
	            $pagination .= '<li class="first active">'.$current_page.'</li>';
	        }elseif($current_page == $total_pages){ //if it's the last active link
	            $pagination .= '<li class="last active">'.$current_page.'</li>';
	        }else{ //regular current link
	            $pagination .= '<li class="active">'.$current_page.'</li>';
	        }
	                
	        for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
	            if($i<=$total_pages){
	                $pagination .= '<li><a href="'.$page_url.'?page='.$i.'">'.$i.'</a></li>';
	            }
	        }
	        if($current_page < $total_pages){ 
	                $next_link = ($i > $total_pages)? $total_pages : $i;
	                $pagination .= '<li><a href="'.$page_url.'?page='.$next_link.'" >&gt;</a></li>'; //next link
	                $pagination .= '<li class="last"><a href="'.$page_url.'?page='.$total_pages.'" title="Last">&raquo;</a></li>'; //last link
	        }
	        
	        $pagination .= '</ul>'; 
	    }
	    return $pagination; //return pagination links
	}

	function post_views( $post_id ) {
		global $idea;
		$count_key = 'views';
	    $count = $idea->get_idea_meta( $post_id, $count_key, false );
	    if( $count == '' ){
	        $idea->add_idea_meta( $post_id, $count_key, '1');
	    } else {
	        $count++;
	        $idea->update_idea_meta( $post_id, $count_key, $count );
	    }
	}