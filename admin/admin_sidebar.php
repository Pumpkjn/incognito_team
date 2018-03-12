<ul class="nav nav-pills nav-stacked list-group">
	<li class="list-group-item <?php echo admin_get_active_tab( $current_tab, 'dashboard' ); ?>" role="presentation"><a href="admin.php">Dashboard</a></li>
	<li class="list-group-item <?php echo admin_get_active_tab( $current_tab, 'idea' ); ?>" role="presentation"><a href="admin_idea.php">Ideas</a></li>
	<li class="list-group-item <?php echo admin_get_active_tab( $current_tab, 'comment' ); ?>" role="presentation"><a href="comment.php">Comments</a></li>
	<li class="list-group-item <?php echo admin_get_active_tab( $current_tab, 'deps' ); ?>" role="presentation"><a href="deps.php">Department</a></li>
	<li class="list-group-item <?php echo admin_get_active_tab( $current_tab, 'user' ); ?>" role="presentation"><a href="users.php">Users</a></li>
	<li class="list-group-item <?php echo admin_get_active_tab( $current_tab, 'email' ); ?>" role="presentation"><a href="email.php">Email Settings</a></li>
	<!-- <li role="presentation"><a href="analyze.php">Manage</a></li> -->

	<li class="list-group-item <?php echo admin_get_active_tab( $current_tab); ?>" role="presentation"><a href="../index.php">Homepage</a></li>
</ul>