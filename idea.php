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
            <!-- the start of an idea -->
            <div class="panel panel-default">
                <div class="panel-heading ">
                    <h4 class="pull-left">
                        <a href="idea.php">Computer upgrade</a>
                    </h4>
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
                                <span> 5 </span>
                            </a>
                        </li>
                        <li>|</li>
                        <li>
                            <a>
                                <span class="glyphicon glyphicon-thumbs-down"></span>
                                <span> 11 </span>
                            </a>
                        </li>
                        <li>|</li>
                        <li>
                            <a href="#">
                                <span class="glyphicon glyphicon-comment"></span>
                                <span>2 comments</span>
                            </a>
                    </ul>
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
                    <div class="divider"></div>
                    <ul class="media-list">
                        <!--                            submit comment-->
                        <li class="media">
                            <div class="media-left pull-left arrow-media-left">
                                <a href="#">
                                    <img class="media-object img-circle" src="assets/img/a1.png">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="media-content">
                                    <form>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="3" placeholder="Comment"></textarea>
                                        </div>
                                        <input type="submit" class="btn btn-primary">
                                    </form>

                                </div>

                            </div>
                        </li>
                        <li class="media">
                            <div class="media-left pull-left arrow-media-left">
                                <a href="#">
                                    <img class="media-object img-circle" src="assets/img/a1.png" >
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="media-content">
                                    <h4 class="media-heading">Nguyen Vu</h4>
                                    <h4 class="media-info"><small><span class="glyphicon glyphicon-calendar"></span>
                                            2 days, 8 hours ago</small></h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi impedit ipsam nobis recusandae repudiandae. Ab deleniti dolorem dolorum, facilis laboriosam magnam officia omnis optio quas reprehenderit, saepe sint tempore voluptas.</p>
                                    <div class="divider"></div>
                                    <ul class="list-inline ">
                                        <li>
                                            <a>
                                                <span class="glyphicon glyphicon-thumbs-up"></span>
                                                <span> 5 </span>
                                            </a>
                                        </li>
                                        <li>|</li>
                                        <li>
                                            <a>
                                                <span class="glyphicon glyphicon-thumbs-down"></span>
                                                <span> 11 </span>
                                            </a>
                                        </li>
                                        <li>|</li>
                                        <li>
                                            <a >
                                                <span class="glyphicon glyphicon-comment"></span>
                                                <span>2 comments</span>
                                            </a>
                                    </ul>
                                </div>
                                <div class="comment-box" id="idea-comments-2">
                                    <div class="media">
                                        <div class="media-left pull-left arrow-media-left">
                                            <a href="#">
                                                <img class="media-object img-circle" src="assets/img/a2.png" >
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="media-content">
                                                <h4 class="media-heading">Nguyen Vu</h4>
                                                <h4 class="media-info"><small><span class="glyphicon glyphicon-calendar"></span>
                                                        2 days, 8 hours ago</small></h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi impedit ipsam nobis recusandae repudiandae. Ab deleniti dolorem dolorum, facilis laboriosam magnam officia omnis optio quas reprehenderit, saepe sint tempore voluptas.</p>
                                                <div class="divider"></div>
                                                <ul class="list-inline ">
                                                    <li>
                                                        <a>
                                                            <span class="glyphicon glyphicon-thumbs-up"></span>
                                                            <span> 5 </span>
                                                        </a>
                                                    </li>
                                                    <li>|</li>
                                                    <li>
                                                        <a>
                                                            <span class="glyphicon glyphicon-thumbs-down"></span>
                                                            <span> 11 </span>
                                                        </a>
                                                    </li>
                                                    <li>|</li>
                                                    <li>
                                                        <a href="#comment-box-1">
                                                            <span class="glyphicon glyphicon-comment"></span>
                                                            <span>2 comments</span>
                                                        </a>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </li>
                        <li class="media">
                            <div class="media-left pull-left arrow-media-left">
                                <a href="#">
                                    <img class="media-object img-circle" src="assets/img/a3.png" >
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="media-content">
                                    <h4 class="media-heading">Nguyen Vu</h4>
                                    <h4 class="media-info"><small><span class="glyphicon glyphicon-calendar"></span>
                                            2 days, 8 hours ago</small></h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi impedit ipsam nobis recusandae repudiandae. Ab deleniti dolorem dolorum, facilis laboriosam magnam officia omnis optio quas reprehenderit, saepe sint tempore voluptas.</p>
                                    <div class="divider"></div>
                                    <ul class="list-inline ">
                                        <li>
                                            <a>
                                                <span class="glyphicon glyphicon-thumbs-up"></span>
                                                <span> 5 </span>
                                            </a>
                                        </li>
                                        <li>|</li>
                                        <li>
                                            <a>
                                                <span class="glyphicon glyphicon-thumbs-down"></span>
                                                <span> 11 </span>
                                            </a>
                                        </li>
                                        <li>|</li>
                                        <li>
                                            <a href="#comment-box-1">
                                                <span class="glyphicon glyphicon-comment"></span>
                                                <span>2 comments</span>
                                            </a>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-body">
                                <a href="#">Load more comments...</a>
                            </div>
                        </li>

                    </ul>


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