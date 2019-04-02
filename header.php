<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        <?php
        wp_title();
        if (is_front_page() == false) {
            echo " - ";
        }
        bloginfo('name');
        ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">

    <?php wp_head(); ?>
    <meta name="author" content="<?php the_author() ?>"/>


    <?php if (!is_user_logged_in()) /* Nur laden wenn User nicht eingeloggt ist. */ { ?>
        <!-- Für Trackingcode -->
        <?php include_once 'tracking.php'; ?>
    <?php }; ?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" defer></script>


    <link rel="stylesheet" type="text/css" href="<?php echo(get_template_directory_uri()); ?>/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo(get_template_directory_uri()); ?>/css/header.css">
    <link rel="stylesheet" type="text/css" href="<?php echo(get_template_directory_uri()); ?>/css/responsivVideo.css">

</head>
<body>
<header>

    <h1 id="posttitel">
        <div class="fitty verticalCenter">
            <?php the_title(); ?>
        </div>
    </h1>

    <div class="desktoponly" id="branding">
        <div class="verticalCenter">
            <div class="centerChilds">
            <a href="<?php echo home_url(); ?>">
                <?php bloginfo('name'); ?>
            </a>
            <?php
            if (get_bloginfo('description') != false) {
                echo '<div id="pageDescription">';
                bloginfo('description');
                echo '</div>';
            }
            ?>
            </div>
        </div>
    </div>


    <script src="<?php echo(get_template_directory_uri()); ?>/PlugIns/fitty/fitty.js"></script>

    <script>
        fitty('.fitty', {
            maxSize: 150
        });
    </script>


    <nav class="navbar navbar-expand-md navbar-light bg-light" role="navigation">
        <div class="container">

            <a class="navbar-brand mobileonly" href="#"><?php bloginfo('name'); ?></a>
            <!-- Brand and toggle get grouped for better mobile display -->
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>



            <?php /* Primary navigation */
            wp_nav_menu( array(
                'theme_location'  => 'header-menu',
                'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
                'container'       => 'div',
                'container_class' => 'collapse navbar-collapse',
                'container_id'    => 'bs-example-navbar-collapse-1',
                'menu_class'      => 'navbar-nav mr-auto',
                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                'walker'          => new WP_Bootstrap_Navwalker(),
            ) );
            ?>
        </div>
    </nav>

</header>
