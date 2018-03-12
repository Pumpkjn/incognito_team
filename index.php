<!DOCTYPE html>
<html>
<?php
require_once("database.php");
require_once("functions.php");
$current_tab = 'home';
include("header.php");
include("top_nav.php");
?>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-9">
            <div class="page-header">
                <h2>Latest ideas</h2>
            </div>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <a class="item active" href="idea.php">
                        <img src="https://i0.wp.com/www.kenlyonsphotography.com.au/wp-content/uploads/2014/10/131010-Mont-St-Michel-France-073738-1024px.jpg?w=1024&ssl=1" alt="...">
                        <div class="carousel-caption">
                            <h3>Title 1</h3>
                            <p>Idea content 1</p>
                        </div>
                    </a>
                    <a class="item" href="idea.php">
                        <img src="https://i0.wp.com/www.kenlyonsphotography.com.au/wp-content/uploads/2014/10/140406-London-England-123524-1024px.jpg?w=1024&ssl=1" alt="...">
                        <div class="carousel-caption">
                            <h3>Title 2</h3>
                            <p>Idea content 2</p>
                        </div>
                    </a>
                    <a class="item" href="idea.php">
                        <img src="data:image/jpeg;base64,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" alt="...">
                        <div class="carousel-caption">
                            <h3>Title 3</h3>
                            <p>Idea content 3</p>
                        </div>
                    </a>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>




            <!-- The end of an idea -->

            <div class="clearfix visible-xs-block"></div>
            <div class="page-header">
                <h2>Departments</h2>
            </div>
            <!-- a department -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Computing</h3>
                </div>
                <div class="panel-body container-fluid my-panel-body">
                    <div class="row my-row">
                        <div class="col-xs-12 col-md-8 no-float bottom-border-xs right-border-md ">

                            <div class="media">
                                <div class="media-left pull-left">
                                    <a href="#">
                                        <img width="110px" height="110px" class="media-object img-thumbnail" src="http://demo.designwall.com/dw-focus/wp-content/uploads/sites/10/time-to-get-tough-with-north-korea-and-iran-as-imminent-nuclear-bomb-test-looms-110x110.jpg" alt="...">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><a>Title</a></h4>
                                    <ul class="list-inline pull-left">
                                        <li>
                                            <span class="glyphicon glyphicon-calendar"></span>
                                            2 days, 8 hours ago
                                        </li>
                                        <li>|</li>
                                        <li>
                                            <span class="glyphicon glyphicon-user"></span>
                                            <a href="#">
                                                John
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                    <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ad quidem quis
                                        voluptatibus? Blanditiis est harum in veniam? Aliquid animi iste porro
                                        quidem quos repudiandae saepe sed sequi similique sint?
                                    </div>

                                </div>
                            </div>
                        </div>
                        <ul class="col-xs-12 col-md-4 no-float list-unstyled my-list">
                            <li role="separator" class="divider only-sx"></li>
                            <li>
                                <a href="#">Lorem ipsum dolor sit amet, consectetur adipi </a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="#">Dapibus ac facilisis in morbi leo risus</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="#">Morbi leo risus dapibus ac facilisis in</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="#">Porta ac consectetur ac dapibus ac facilisis</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="#">Vestibulum at eros porta ac consectetur</a>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix">
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Art</h3>
                </div>
                <div class="panel-body container-fluid my-panel-body">
                    <div class="row my-row">
                        <div class="col-xs-12 col-md-8 no-float bottom-border-xs right-border-md ">

                            <div class="media">
                                <div class="media-left pull-left">
                                    <a href="#">
                                        <img width="110px" height="110px" class="media-object img-thumbnail" src="http://www.planetware.com/photos-large/ENG/london-victoria-and-albert-museum-national-art-library.jpg" alt="...">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><a>Title</a></h4>
                                    <ul class="list-inline pull-left">
                                        <li>
                                            <span class="glyphicon glyphicon-calendar"></span>
                                            2 days, 8 hours ago
                                        </li>
                                        <li>|</li>
                                        <li>
                                            <span class="glyphicon glyphicon-user"></span>
                                            <a href="#">
                                                John
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                    <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ad quidem quis
                                        voluptatibus? Blanditiis est harum in veniam? Aliquid animi iste porro
                                        quidem quos repudiandae saepe sed sequi similique sint?
                                    </div>

                                </div>
                            </div>
                        </div>
                        <ul class="col-xs-12 col-md-4 no-float list-unstyled my-list">
                            <li role="separator" class="divider only-sx"></li>
                            <li>
                                <a href="#">Lorem ipsum dolor sit amet, consectetur adipi </a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="#">Dapibus ac facilisis in morbi leo risus</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="#">Morbi leo risus dapibus ac facilisis in</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="#">Porta ac consectetur ac dapibus ac facilisis</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="#">Vestibulum at eros porta ac consectetur</a>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix">
                    </div>
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