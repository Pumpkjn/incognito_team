<!DOCTYPE html>
<html>
<?php
require_once("database.php");
require_once("functions.php");
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
            <div id="myCarousel" class="carousel slide" data-ride="carousel" style="padding: 0px 30px 0px 30px;">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <a href="idea.php">
                            <div class="panel panel-default">
                                <div class="panel-heading ">
                                    <h4 class="pull-left">Title</h4>
                                    <div class="cats pull-right ">
                                        <h5>Categories:
                                            <a href="#"><span class="label label-primary">computing</span></a>
                                            <a href="#"><span class="label label-primary">life</span></a>
                                            <a href="#"><span class="label label-primary">love</span></a>
                                        </h5>

                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-body">
                                    <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aperiam aspernatur beatae
                                        corporis doloribus eligendi, enim esse ex ipsa magnam modi nihil nostrum, odio tempora
                                        voluptas. Aperiam odit recusandae soluta!
                                    </div>
                                    <div>Alias amet, ducimus earum excepturi harum inventore, nobis obcaecati odit officiis
                                        praesentium quaerat quas quibusdam totam vero vitae! Dolore dolores ducimus fugit laudantium
                                        numquam placeat possimus soluta suscipit voluptatem, voluptates!
                                    </div>
                                    <div>Adipisci animi aut, eos et laborum laudantium maiores maxime molestias nam possimus quo
                                        repellendus saepe, velit? Alias, dolor eum ex fuga illo illum inventore iste libero, minima
                                        nesciunt praesentium tempore.
                                    </div>
                                    <div>At, corporis deleniti dolor eos et expedita explicabo fugiat id in inventore ipsam maiores
                                        minus, modi nisi perferendis perspiciatis, porro praesentium quis quod repellat
                                        reprehenderit sed similique sit unde voluptatem?
                                    </div>
                                    <div>A aliquam amet aperiam asperiores dicta enim eos et fugiat illum impedit in itaque iusto
                                        minima nobis odit officia officiis, qui ratione repudiandae sed soluta tempora unde
                                        voluptatem. Assumenda, eum.
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <ul class="list-inline pull-left">
                                        <li>
                                            <a>
                                                <span class="glyphicon glyphicon-thumbs-up"></span>
                                                <span> Up </span>
                                            </a>
                                        </li>
                                        <li>|</li>
                                        <li>
                                            <a>
                                                <span class="glyphicon glyphicon-thumbs-down"></span>
                                                <span> Down </span>
                                            </a>
                                        </li>
                                        <li>|</li>
                                        <li>
                                            <a>
                                                <span class="glyphicon glyphicon-comment"></span>
                                                <span>2 comments</span>
                                            </a>
                                        </li></ul>
                                    <ul class="list-inline pull-right">
                                        <li>
                                            <span class="glyphicon glyphicon-calendar"></span>
                                            2 days, 8 hours ago
                                        </li>
                                        <li>|</li>
                                        <li>
                                            <span class="glyphicon glyphicon-user"></span>
                                            by
                                            <a href="#">
                                                John
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </a>

                    </div>

                    <div class="item">
                        <div class="panel panel-default">
                            <div class="panel-heading ">
                                <h4 class="pull-left">Title</h4>
                                <div class="cats pull-right ">
                                    <h5>Categories:
                                        <a href="#"><span class="label label-primary">computing</span></a>
                                        <a href="#"><span class="label label-primary">life</span></a>
                                        <a href="#"><span class="label label-primary">love</span></a>
                                    </h5>

                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aperiam aspernatur beatae
                                    corporis doloribus eligendi, enim esse ex ipsa magnam modi nihil nostrum, odio tempora
                                    voluptas. Aperiam odit recusandae soluta!
                                </div>
                                <div>Alias amet, ducimus earum excepturi harum inventore, nobis obcaecati odit officiis
                                    praesentium quaerat quas quibusdam totam vero vitae! Dolore dolores ducimus fugit laudantium
                                    numquam placeat possimus soluta suscipit voluptatem, voluptates!
                                </div>
                                <div>Adipisci animi aut, eos et laborum laudantium maiores maxime molestias nam possimus quo
                                    repellendus saepe, velit? Alias, dolor eum ex fuga illo illum inventore iste libero, minima
                                    nesciunt praesentium tempore.
                                </div>
                                <div>At, corporis deleniti dolor eos et expedita explicabo fugiat id in inventore ipsam maiores
                                    minus, modi nisi perferendis perspiciatis, porro praesentium quis quod repellat
                                    reprehenderit sed similique sit unde voluptatem?
                                </div>
                                <div>A aliquam amet aperiam asperiores dicta enim eos et fugiat illum impedit in itaque iusto
                                    minima nobis odit officia officiis, qui ratione repudiandae sed soluta tempora unde
                                    voluptatem. Assumenda, eum.
                                </div>
                            </div>
                            <div class="panel-footer">
                                <ul class="list-inline pull-left">
                                    <li>
                                        <a>
                                            <span class="glyphicon glyphicon-thumbs-up"></span>
                                            <span> Up </span>
                                        </a>
                                    </li>
                                    <li>|</li>
                                    <li>
                                        <a>
                                            <span class="glyphicon glyphicon-thumbs-down"></span>
                                            <span> Down </span>
                                        </a>
                                    </li>
                                    <li>|</li>
                                    <li>
                                        <a>
                                            <span class="glyphicon glyphicon-comment"></span>
                                            <span>2 comments</span>
                                        </a>
                                    </li></ul>
                                <ul class="list-inline pull-right">
                                    <li>
                                        <span class="glyphicon glyphicon-calendar"></span>
                                        2 days, 8 hours ago
                                    </li>
                                    <li>|</li>
                                    <li>
                                        <span class="glyphicon glyphicon-user"></span>
                                        by
                                        <a href="#">
                                            John
                                        </a>
                                    </li>
                                </ul>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="panel panel-default">
                            <div class="panel-heading ">
                                <h4 class="pull-left">Title</h4>
                                <div class="cats pull-right ">
                                    <h5>Categories:
                                        <a href="#"><span class="label label-primary">computing</span></a>
                                        <a href="#"><span class="label label-primary">life</span></a>
                                        <a href="#"><span class="label label-primary">love</span></a>
                                    </h5>

                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aperiam aspernatur beatae
                                    corporis doloribus eligendi, enim esse ex ipsa magnam modi nihil nostrum, odio tempora
                                    voluptas. Aperiam odit recusandae soluta!
                                </div>
                                <div>Alias amet, ducimus earum excepturi harum inventore, nobis obcaecati odit officiis
                                    praesentium quaerat quas quibusdam totam vero vitae! Dolore dolores ducimus fugit laudantium
                                    numquam placeat possimus soluta suscipit voluptatem, voluptates!
                                </div>
                                <div>Adipisci animi aut, eos et laborum laudantium maiores maxime molestias nam possimus quo
                                    repellendus saepe, velit? Alias, dolor eum ex fuga illo illum inventore iste libero, minima
                                    nesciunt praesentium tempore.
                                </div>
                                <div>At, corporis deleniti dolor eos et expedita explicabo fugiat id in inventore ipsam maiores
                                    minus, modi nisi perferendis perspiciatis, porro praesentium quis quod repellat
                                    reprehenderit sed similique sit unde voluptatem?
                                </div>
                                <div>A aliquam amet aperiam asperiores dicta enim eos et fugiat illum impedit in itaque iusto
                                    minima nobis odit officia officiis, qui ratione repudiandae sed soluta tempora unde
                                    voluptatem. Assumenda, eum.
                                </div>
                            </div>
                            <div class="panel-footer">
                                <ul class="list-inline pull-left">
                                    <li>
                                        <a>
                                            <span class="glyphicon glyphicon-thumbs-up"></span>
                                            <span> Up </span>
                                        </a>
                                    </li>
                                    <li>|</li>
                                    <li>
                                        <a>
                                            <span class="glyphicon glyphicon-thumbs-down"></span>
                                            <span> Down </span>
                                        </a>
                                    </li>
                                    <li>|</li>
                                    <li>
                                        <a>
                                            <span class="glyphicon glyphicon-comment"></span>
                                            <span>2 comments</span>
                                        </a>
                                    </li></ul>
                                <ul class="list-inline pull-right">
                                    <li>
                                        <span class="glyphicon glyphicon-calendar"></span>
                                        2 days, 8 hours ago
                                    </li>
                                    <li>|</li>
                                    <li>
                                        <span class="glyphicon glyphicon-user"></span>
                                        by
                                        <a href="#">
                                            John
                                        </a>
                                    </li>
                                </ul>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--         Left and right controls-->
                <a class="left my-carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>

                </a>
                <a class="right my-carousel-control" href="#myCarousel" data-slide="next" role="button">
                    <span class="glyphicon glyphicon-chevron-right"></span>
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