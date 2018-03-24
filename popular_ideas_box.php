<!-- Popular idea -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Popular ideas</h3>
    </div>
    <?php
        global $idea;
        $ideas = $idea->get_popular_ideas();
        if ( $ideas ) {
            foreach ( $ideas as $i ) { ?>
                <div class="list-group">
                    <a href="idea.php?id=<?php echo $i['id'] ?>" class="list-group-item">
                        <h4 class="list-group-item-heading"><?php echo $idea->get_idea_meta( $i['id'], 'title', false ); ?></h4>
                        <p class="list-group-item-text">
                            <?php

                            $desc = $idea->get_idea_meta( $i['id'], 'desc', false );
                            echo substr($desc,0,256);
                            if (strlen($desc)>256) echo "...";
                            ?>
                        </p>
                    </a>
                </div>
            <?php }
        }
    ?>
    

</div>