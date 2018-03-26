<?php
require_once("database.php");
require_once("functions.php");
include("header.php");
include("top_nav.php");
$db_idea = new idea();
$db_user = new User();
$db_deps = new DEPS();

?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-9">
            <?php
                if (!isset($_GET["dep_id"]) || !is_numeric($_GET["dep_id"]))
                {
                    include "all_departments_section.php";
                }
                else {
                    $dep_id = $_GET["dep_id"];
                    $dep = $db_deps->get_dep_by_id($dep_id);
                    echo "<div class=\"page-header\">
                            <h2>{$dep["name"]}</h2>
                          </div>";
                    $cur_tab = "active";
                    if (isset($_GET["status"]) && $_GET['status'] == 'closed') $cur_tab = "closed";


                    $page = 1;

                    if (isset($_GET["page"]) && is_numeric($_GET["page"])) {
                        $page = $_GET["page"];
                    }

                    $num_per_page = 5;
                    $num_off_set = ($page - 1) * $num_per_page;
                    $ideas = $db_idea->get_ideas_by_dep($dep_id, $num_per_page, $num_off_set);

                    if ($page > 1) $lprev = "?dep_id=$dep_id&page=" . ($page - 1); else $lprev = "#";
                    if (count($ideas) == $num_per_page) $lnext = "?dep_id=$dep_id&page=" . ($page + 1); else $lnext = "#";

                    ?>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" <?php if ($cur_tab == 'active') echo "class='active'" ?>>
                                    <a href="deparments.php?status=active" aria-controls="home" role="tab">Active</a>
                                </li>
                                <li role="presentation" <?php if ($cur_tab == 'closed') echo "class='active'"; ?>"">
                                <a href="deparments.php?status=closed" aria-controls="home" role="tab">Closed</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active">
                                    <?php
                                    if ($ideas)
                                        foreach ($ideas as $idea) {
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
                                                    if ($set) {
                                                        ?>
                                                        <div class="cats pull-right ">
                                                            <h5>Categories:
                                                                <?php
                                                                foreach ($set as $item) {
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
                                                    echo $db_idea->get_idea_meta($idea["id"], "desc", false);
                                                    ?>
                                                </div>
                                                <div class="panel-footer">
                                                    <ul class="list-inline pull-right">
                                                        <li>
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                            <?php
                                                            $date = new DateTime($idea["date"]);
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
                                            <li class="previous <?php if ($lprev == "#") echo "disabled"; ?>"><a
                                                        href="<?php echo $lprev; ?>"><span
                                                            aria-hidden="true">&larr;</span> Previous</a></li>
                                            <li class="next <?php if ($lnext == "#") echo "disabled"; ?>"><a
                                                        href="<?php echo $lnext; ?>">Next <span aria-hidden="true">&rarr;</span></a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

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


