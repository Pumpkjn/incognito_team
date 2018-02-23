<?php
    require_once("database.php");
    require_once("functions.php");
    include("header.php");
    $current_tab = 'login';
    include("templates/top_nav.php");
?>

    <div class="login-page">
        <div class="back">
            <?php if ( !is_user_login() ) : ?>

          <div class="div-center">
            <div class="content">
                    <center><img src="assets/img/logo.png" alt="logo" height="100" width="100"></center>
                        <form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST" action="modules/login.php">
                            <?php 
                                $login_fail = isset( $_GET['login_fail'] ) ? $_GET['login_fail'] : null;
                                if ( $login_fail  ) { ?>
                                    <div class="alert alert-warning">
                                        Wrong Email or Password.
                                    </div>
                                <?php }
                            ?>
                           <label for="email">Email</label>
                           <div class="input-group">
                                 <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="email" type="text" class="form-control" name="email" value="" placeholder="Email">                                        
                            </div>
                            <br />
                            <label for="password">Password</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                            </div>                                                                  
                            <br />
                            <br />
                             <center><button type="submit" name="login" class="btn btn-success btn-md btn-block">Login</button>
                            <br />
                            <!-- <a class="btn btn-link" href="changepw.php" name="forgotpw">Forgot Password?</a></button></center> -->
                           
                        </form>
                </div>
            </div>
        <?php endif; ?>
        </div>
    </div>

<?php 
    include("footer.php");
?>