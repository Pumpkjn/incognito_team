<!DOCTYPE html>
<html>
<?php
require_once("database.php");
require_once("functions.php");
include("header.php");
include("top_nav.php");
$cuser = $user->get_current_user();
if (isset($_GET["id"]))
{
    $puser = $user->get_user_by_id($_GET["id"]);
}
else if ($cuser)
    $puser = $cuser;

echo $puser["dep_id"];

if ($puser["dep_id"])
    $user_dep= $deps->get_dep_by_id($puser["dep_id"]);


?>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-9">
            <div class="panel panel-default">

                <div class="panel-body">

                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#profile" aria-controls="home" role="tab" data-toggle="tab">Profile</a>
                        </li>
                        <li role="presentation">
                            <a href="#settings" aria-controls="home" role="tab" data-toggle="tab">Settings</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="profile">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-12 col-md-8">
                                        <div class="media">
                                            <div class="media-left pull-left">
                                                <a>
                                                    <img class="img-circle" src="assets/img/a1.png">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="media-heading">
                                                    <a><h4><?php echo $puser["username"];?></h4></a>
                                                </div>
                                                <table class="table">
                                                    <tr>
                                                        <td>Name:</td>
                                                        <td><?php echo $puser["name"]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Role:</td>
                                                        <td><?php echo $user->get_role_text($puser["role"]); ?></td>
                                                    </tr>
                                                    <?php
                                                        if (isset($user_dep))
                                                        {
                                                            echo "
                                                                <tr>
                                                                    <td>Department: </td>
                                                                    <td>{$user_dep["name"]}</td>
                                                                </tr>
                                                            ";
                                                        }
                                                    ?>

                                                    <tr>
                                                        <td>Email:</td>
                                                        <td><?php echo $puser["email"]; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                  <!--   <div class="col-sm-12 col-md-4">
                                        <h4 class="text-primary">Update</h4>

                                        <div class="list-group">
                                            <a href="#" class="list-group-item">
                                                Change password
                                            </a>
                                            <a href="#" class="list-group-item">Change avatar</a>

                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="settings">
                            <form>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email notifications</label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Some one commented on your idea
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Sone one commented on your comment
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mobile notifications</label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Some one commented on your idea
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Sone one commented on your comment
                                        </label>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
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