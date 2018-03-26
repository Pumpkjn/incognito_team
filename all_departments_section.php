<div class="clearfix visible-xs-block"></div>
<div class="page-header">
    <h2><a href="deparments.php" style="color: #333">Departments</a></h2>
</div>
<!-- a department -->
<?php
    $deps = $db_deps->get_all_department();
    if ($deps) {
        foreach ($deps as $dep) {
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><a href="deparments.php?dep_id=<?php echo $dep["id"];?>"><?php echo $dep["name"];?></a></h3>
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
                                    if ($i!=1) echo "<li role=\"separator\" class=\"divider\"></li>";
                                    else echo "<li role=\"separator\" class=\"divider visible-xs-block visible-xs-block visible-sm-block\"></li>";
                                    $dep_idea = $dep_ideas[$i];
                                    echo "<li><a href='idea.php?id={$dep_idea["id"]}'>{$db_idea->get_idea_meta($dep_idea["id"],"title",false)}</a></li>";

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

