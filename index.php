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
            <?php
                $deps = $db_deps->get_all_department();
                if ($deps) {
                    foreach ($deps as $dep) {
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><?php echo $dep["name"];?></h3>
                            </div>
                            <div class="panel-body container-fluid my-panel-body">
                                <div class="row my-row">
                                    <?php
                                    $dep_ideas = $db_idea->get_ideas_by_dep($dep["id"],6,0);
                                    if ($dep_ideas)
                                    {
                                        $first_idea = $dep_ideas[0];
                                        ?>
                                        <div class="col-xs-12 col-md-8 no-float bottom-border-xs right-border-md ">
                                            <div class="media">
                                                <div class="media-left pull-left">
                                                    <a href="#">
                                                        <img width="110px" height="110px" class="media-object img-thumbnail"
                                                             src="assets/img/dep_<?php echo $dep["id"]%5;?>.jpg"
                                                             alt="...">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">
                                                        <?php
                                                            echo "<a href='idea.php?id={$first_idea["id"]}'>{$db_idea->get_idea_meta($first_idea["id"],"title",false)}</a>";
                                                        ?>
                                                    </h4>
                                                    <ul class="list-inline pull-left">
                                                        <li>
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                            <?php
                                                            $date= new DateTime($first_idea["date"]);
                                                            echo $date->format("M j, Y");
                                                            ?>
                                                        </li>
                                                        <li>|</li>
                                                        <li>
                                                            <span class="glyphicon glyphicon-user"></span>
                                                            <a href="#">
                                                                <?php
                                                                $user = $db_user->get_user_by_id($first_idea["user_id"]);

                                                                echo "<a href='user_profile.php?user_id={$user["id"]}'>{$user["name"]}</a>";
                                                                ?>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                    <div>
                                                        <?php
                                                            $desc = $db_idea->get_idea_meta($first_idea["id"],"desc",false);
                                                            echo substr($desc,0,256);
                                                            if (strlen($desc)>256) echo "...";
                                                        ?>
                                                    </div>
                                                    <?php
                                                        $set = $db_idea->get_idea_categories($first_idea["id"]);
                                                        if ($set) {
                                                            ?>
                                                            <h5>
                                                                <?php
                                                                foreach ($set as $item) {
                                                                    echo "<a class='cats' href=\"#\"><span class=\"label label-primary\">{$item["name"]}</span></a>";
                                                                }
                                                                ?> </h5>
                                                            <?php
                                                        }
                                                            ?>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="col-xs-12 col-md-4 no-float list-unstyled my-list">

                                        <?php
                                        for($i=1, $len = count($dep_ideas); $i<$len; $i++)
                                        {
                                            $dep_idea = $dep_ideas[$i];
                                            echo "<li><a href='idea.php?id={$dep_idea["id"]}'>{$db_idea->get_idea_meta($dep_idea["id"],"title",false)}</a></li>";
                                            if ($i!=$len-1) echo "<li role=\"separator\" class=\"divider\"></li>";
                                        }
                                        ?>
                                        </ul>
                                        <?php
                                    }
                                    ?>


                                </div>
                                <div class="clearfix">
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                }
         ?>
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