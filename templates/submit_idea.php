<!DOCTYPE html>
<html>
<?php include "head.php"; ?>
<body>

<?php
include_once "top_nav.php";
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Submit idea</h4>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-2">Title</label>
                            <div class="col-sm-10">
                                <input class="form-control" placeholder="Title of the idea">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Definition</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" placeholder="Idea definition" rows="8"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Departments</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="dep_id">
                                    <option value="1">Computing</option>
                                    <option value="2">Architect</option>
                                    <option value="3">Business</option>
                                    <option value="4">Electrical engineering</option>
                                    <option value="5">Art</option>
                                    <option value="6">Music</option>
                                </select>
                            </div>
                            <label class="col-sm-2">Closure date</label>
                            <div class="col-sm-4">
                                <input type="datetime-local" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Categories</label>
                            <div class="col-sm-4">
                                <select class="form-control name="tag_id">
                                <option value="1">Life</option>
                                <option value="2">Is </option>
                                <option value="3">Beautiful</option>
                                <option value="4">Enjoy</option>
                                <option value="5">It</option>
                                <option value="6">No matter</option>
                                </select>
                            </div>
<!--                            <button class="btn btn-default col-sm-1">Add <span aria-hidden="true">&rarr;</span></button>-->
<!--                            <ul class="col-sm-4 col-sm-offset-1 list-inline " style="margin-left: 15px;">-->
<!--                                <li><span class="label label-primary">life</span></li>-->
<!--                                <li><span class="label label-primary">love</span></li>-->
<!--                                <li><span class="label label-primary">computing</span></li>-->
<!--                                <li><span class="label label-primary">forever</span></li>-->
<!--                            </ul>-->
                        </div>
                    </form>
                </div>
                <div class="panel-footer">
                    <input type="submit" class="btn btn-primary pull-right" >
                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
        <div class="col-xs-12 col-md-3">
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