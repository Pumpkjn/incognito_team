<!-- Top navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Logo + toggle button -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapsable-menu">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Incognito</a>
        </div>
        <!-- Collapseable menu -->
        <div class="collapse navbar-collapse" id="collapsable-menu">
            <ul class="nav navbar-nav">
                <li class="<?php if (isset($current_tab)) echo get_active_tab( $current_tab, 'home' ); ?>">
                    <a href="index.php">Home</a>
                </li>
                <li class="dropdown <?php if (isset($current_tab)) echo get_active_tab( $current_tab, 'category' ); ?>">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Departments
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                        $departments = $deps->get_all_department();
                        $cnt = 0;
                        if ($departments)
                            foreach ($departments as $dep)
                            {
                                echo "<li> <a href=\"deparments.php?dep_id={$dep["id"]}\">{$dep["name"]}</a></li>";

                            }
                        ?>
                    </ul>
                </li>
                <li class="<?php if (isset($current_tab)) echo get_active_tab( $current_tab, 'submit-idea' ); ?>">
                    <a href="submit-idea.php">Submit Idea</a>

                </li>
                <?php if ( is_user_login() ) : ?>
                <li class="<?php if (isset($current_tab)) echo get_active_tab( $current_tab, 'my-idea' ); ?>">
                    <a href="my-idea.php">My Idea</a>
                </li>
                <?php endif; ?>
                <?php if ( current_user_can_manage() ) : ?>
                    <li>
                        <a href="admin/admin.php">Dashboard</a>
                    </li>
                <?php endif; ?>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                    if ( !is_user_login() ) { ?>
                        <li>
                            <a id="nav-login" href="login.php">Login</a>
                        </li>
                    <?php } else {
                ?>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle avatar-small" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <img class="img-responsive img-circle" src="assets/img/a1.png">
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="user_profile.php">User profile</a></li>
                        <li><a href="#">Preferences</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="modules/logout.php">Log out</a></li>
                    </ul>
                </li>
                <?php } ?>
            </ul>

        </div>
    </div>
</nav>