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
            <a class="navbar-brand" href="home.php">Incognito</a>
        </div>
        <!-- Collapseable menu -->
        <div class="collapse navbar-collapse" id="collapsable-menu">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="home.php">Home</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Departments
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li> <a href="#">Computing</a> </li>
                        <li> <a href="#">Electrical Engineering</a> </li>
                        <li class="divider"></li>
                        <li> <a href="#">Business</a></li>
                        <li> <a href="#">Accounting</a> </li>
                        <li class="divider"></li>
                        <li> <a href="#">Art</a></li>
                        <li> <a href="#">Music</a> </li>
                    </ul>
                </li>
                <li>
                    <a href="submit_idea.php">Submit Idea</a>
                </li>
                <li>
                    <a href="#">My Idea</a>
                </li>
                <li>
                    <a href="#">Work</a>
                </li>

            </ul>
            <!--<form class="navbar-form navbar-right" href="login.php" role="login">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
                <a class="btn btn-default">Sign up</a>
            </form>-->
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle avatar-small" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <img class="img-responsive img-circle" src="../assets/img/a1.png">
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="user_profile.php">User profile</a></li>
                        <li><a href="#">Preferences</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Log out</a></li>
                    </ul>
                </li>

            </ul>

        </div>
    </div>
</nav>