<!DOCTYPE html>
<html>
<?php
require_once("database.php");
require_once("functions.php");
$current_tab = 'home';
include("header.php");
include("top_nav.php");
$db_idea = new idea();
$db_user = new User();
$db_deps = new DEPS();

$page=1;
if (isset($_GET["page"]))
{
    $page = $_GET["page"];
    if (!is_numeric($page)) $page = 1;
}

$num_per_page = 5;
$num_off_set = ($page-1)*$num_per_page;
$ideas = $db_idea->get_all_ideas($num_per_page,$num_off_set);

if ($page>1) $lprev = "?page=".($page-1); else $lprev="#";
if (count($ideas)==$num_per_page) $lnext = "?page=".($page+1); else $lnext="#";
?>
<body>


<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-9">
            <div class="page-header">
                <h2>Latest ideas</h2>
            </div>
            <?php
            if ($ideas)
                foreach ($ideas as $idea)
                {
                    ?>
                    <!--begining of an idea -->
                    <div class="panel panel-default">
                        <div class="panel-heading ">
                            <h4 class="pull-left">
                                <?php
                                echo "<a href='idea.php?id={$idea["id"]}'>{$db_idea->get_idea_meta($idea["id"],"title",false)}</a>";
                                ?>
                            </h4>
                            <?php
                                $set = $db_idea->get_idea_categories($idea["id"]);
                                if ($set){
                            ?>
                            <div class="cats pull-right ">
                                <h5>Categories:
                                    <?php
                                        foreach ($set as $item)
                                        {
                                            echo "<a class='cats' href=\"#\"><span class=\"label label-primary\">{$item["name"]}</span></a>";
                                        }
                                    ?>
                                </h5>
                            </div>
                            <?php
                                }
                            ?>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <?php
                            echo $db_idea->get_idea_meta($idea["id"],"desc",false);
                            ?>
                        </div>
                        <div class="panel-footer">
                            <ul class="list-inline pull-right">
                                <li>
                                    <span class="glyphicon glyphicon-calendar"></span>
                                    <?php
                                    $date= new DateTime($idea["date"]);
                                    echo $date->format("M j, Y");
                                    ?>
                                </li>
                                <li>|</li>
                                <li>
                                    <span class="glyphicon glyphicon-user"></span>
                                    by
                                    <?php
                                    $user = $db_user->get_user_by_id($idea["user_id"]);

                                    echo "<a href='user_profile.php?user_id={$user["id"]}'>{$user["name"]}</a>";
                                    ?>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                    </div>
                    <?php
                }
            ?>
            <nav>
                <ul class="pager">
                    <li class="previous <?php if ($lprev=="#") echo "disabled";?>"><a href="<?php echo $lprev; ?>"><span aria-hidden="true">&larr;</span> Previous</a></li>
                    <li class="next <?php if ($lnext=="#") echo "disabled";?>"><a href="<?php echo $lnext; ?>">Next <span aria-hidden="true">&rarr;</span></a></li>
                </ul>
            </nav>

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
            <?php
                include "search_box.php";

            ?>
            <?php include "categories_box.php"; ?>
            <?php include "popular_ideas_box.php"; ?>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>