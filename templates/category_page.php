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