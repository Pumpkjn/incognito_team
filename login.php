<?php
    require_once("database.php");
    require_once("functions.php");
    include("header.php");
?>

<?php
    session_start();
    if ( isset( $_SESSION['login'] ) ) {
        if ( 1 == $_SESSION['login'] ) { ?>
            <li><a href="admin/admin.php"><?php echo ucfirst( get_user_name( $_SESSION['id'] ) ); ?></a></li>
            <li><a href="modules/logout.php"> Log out </a></li>
        <?php }
    } else { ?>
        <?php login_form(); ?>
    <?php }
?>

<?php
    include("footer.php");
?>