<?php
    require_once("database.php");
    require_once("functions.php");
 ?>
 <html>
 <head>
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="assets/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
    <link href="assets/css/login.css" rel="stylesheet" type="text/css">
    <script src="assets/js/jquery-1.9.1.min.js"  type="text/javascript"></script>
    <script src="assets/js/bootstrap.js"  type="text/javascript"></script>
    <script src="assets/js/isotope.min.js"  type="text/javascript"></script>
    <script src="assets/js/masonry.pkgd.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Reset Password | Incognito</title>
</head>
<body>
<div class="back">
  <div class="div-center">
    <div class="content">
            <center><img src="assets/img/logo.png" alt="logo" height="100" width="100"></center>
                <form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST">
                  <label for="oldpassword">Current Password</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="oldpassword" type="password" class="form-control" name="oldpassword" placeholder="Current Password">
                    </div> 
                    <br />
                    <label for="newpassword">New Password</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="newpassword" type="password" class="form-control" name="newpassword" placeholder="New Password">
                    </div>                                                                  
                    <br />
                       <label for="confirmpassword">Confirm Password</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="confirmpassword" type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password">
                    </div>  
                    <br />
                     <center><button type="submit" name="submit" class="btn btn-success btn-md btn-block">Change password</button>
                    <br />
                                       
                </form>
        </div>
    </div>
</div>


<?php 
    include("footer.php");
?>