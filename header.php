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

    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" defer></script>
    <script src="//stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" defer></script>


    <link rel="stylesheet" type="text/css" href="<?php echo(get_template_directory_uri()); ?>/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo(get_template_directory_uri()); ?>/css/header.css">
    <link rel="stylesheet" type="text/css" href="<?php echo(get_template_directory_uri()); ?>/css/responsivVideo.css">

</head>
<body>
<header>


    <?php wp_head(); ?>
    <meta name="author" content="<?php the_author() ?>"/>

    <h1 id="posttitel">
        <div class="fitty">
            <?php the_title(); ?>
        </div>
    </h1>

    <div id="branding">
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


    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>

            <?php /* Primary navigation */
            wp_nav_menu(array(
                    'menu' => 'top_menu',
                    'theme_location' => 'header-menu',
                    'container_id' => 'myNavbar',
                    'container_class' => 'collapse navbar-collapse',

                    'menu_class' => 'nav navbar-nav navbar-right',
                    //Process nav menu using our custom nav walker
                    'walker' => new wp_bootstrap_navwalker())
            );
            ?>
        </div>
    </nav>

</header>
