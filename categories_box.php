<!-- Categories -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Categories</h3>
    </div>

    <ul class="list-group">
        <?php
            $idea= new idea();
            $cats = $idea->get_all_category();
            if ($cats)
            foreach ($cats as $cat)
            {
                echo "<li class='list-group-item'>
                        <span class='badge'>14</span>
                        <a href='category_page.php?cat_id={$cat["id"]}'>{$cat["name"]}</a>
                      </li>";
            }
        ?>
<!--        <li class="list-group-item">-->
<!--            <span class="badge">14</span>-->
<!--            <a href="category_page.php">Computer upgrade </a>-->
<!--        </li>-->

    </ul>
</div>