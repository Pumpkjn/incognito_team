<!DOCTYPE html>
<html>
<?php
require_once("database.php");
require_once("functions.php");
include("header.php");
include("top_nav.php");
$db_idea = new idea();
$db_user = new User();
$cat_id = $_GET["cat_id"];
$cat = $idea->get_category_by($cat_id,"id")[0];
$ideas = $idea->get_all_ideas_by_category($cat_id);
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-9">
            <div class="page-header">
                <h2><small>Category:</small> <span class="label label-primary"><?php echo $cat["name"];?> </span></h2>
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
                            echo "<a href='idea.php?{$idea["id"]}'>{$db_idea->get_idea_meta($idea["id"],"title",false)}</a>";
                        ?>
                    </h4>
                    <div class="cats pull-right ">
                        <h5>Categories:
                            <?php
                                $set = $db_idea->get_idea_categories($idea["id"]);
                                if ($set)
                                foreach ($set as $item)
                                {
                                    echo "<a href=\"#\"><span class=\"label label-primary\">{$item["name"]}</span></a>";
                                }
                            ?>
                        </h5>

                    </div>
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

                                echo "<a href='user_profile.php?{$user["id"]}'>{$user["name"]}</a>";
                            ?>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

            </div>
                    <?php
                }
            ?>
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