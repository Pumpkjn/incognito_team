<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap 101 Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<?php
include_once "top_nav.php";
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    User information
                </div>
                <div class="panel-body">
                    <div class="media">
                        <div class="media-left pull-left">
                            <a>
                                <img class="img-circle" src="http://icons.iconarchive.com/icons/designbolts/free-male-avatars/64/Male-Avatar-Cool-Cap-icon.png">
                            </a>
                        </div>
                        <div class="media-body">
                            <div class="media-heading">
                                <a><h4>Nguyen Vu</h4></a>
                            </div>
                            <table class="table">
                                <tr>
                                    <td>Role:</td>
                                    <td>Coordinator</td>
                                </tr>
                                <tr>
                                    <td>Department: </td>
                                    <td>Computing</td>
                                </tr>
                                <tr>
                                    <td>Room: </td>
                                    <td>QM362</td>
                                </tr>
                                <tr>
                                    <td>Date of birth: </td>
                                    <td>03/02/1994</td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td>nguyenvu9405@gmail.com</td>
                                </tr>


                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <ul class="list-inline pull-right">
                        <li>
                            <a role="button" type="button" class="btn btn-default" href="change_profile.php" title="Profile Change">
                                <span class="glyphicon glyphicon-cog"  aria-hidden="true"></span>
                            </a>
                        </li>
                        <li>
                            <a role="button" type="button" class="btn btn-default" href="change_password.php" title="Profile Change">
                                <span class="glyphicon glyphicon-repeat"  aria-hidden="true"></span>
                            </a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    <div class="col-xs-12 col-md-3 ">
            <!-- Search box-->
            <?php include "search_box.php"; ?>
            <?php include "categories_box.php"; ?>
            <?php include "popular_ideas_box.php"; ?>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>