<!DOCTYPE html>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.js"></script>
<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="<?php echo(get_template_directory_uri()); ?>/frameworks/fancyBox/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?php echo(get_template_directory_uri()); ?>/frameworks/fancyBox/jquery.fancybox.css?v=2.1.5" media="screen" />
<script src="<?php echo(get_template_directory_uri()); ?>/design.js"></script>


<script type="text/javascript" src="<?php echo(get_template_directory_uri()); ?>/frameworks/blur.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" defer></script>

<link href="<?php echo(get_template_directory_uri()); ?>/style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" defer></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" defer></script>


    <!--[if lt IE 9]>
		<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.js"></script>
	<![endif]-->


    <link rel="stylesheet" type="text/css" href="<?php echo(get_template_directory_uri()); ?>/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo(get_template_directory_uri()); ?>/css/header.css">
    <link rel="stylesheet" type="text/css" href="<?php echo(get_template_directory_uri()); ?>/css/responsivVideo.css">

</head>
<body>
<header>


		<?php wp_head(); ?>
		<meta name="author" content="<?php the_author() ?>" />

    <h1 id="posttitel">
        <div class="fitty">
            <?php the_title(); ?>
        </div>

    </h1>

    <div id="brand">
    <a href="<?php echo home_url(); ?>">
        <div id="pageName"><?php bloginfo('name');?></div>
    </a>
    <?php
    if( get_bloginfo('description') != false ){
        echo '<div id="pageDescription">';
        bloginfo('description');
        echo '</div>';
    }
    ?>
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
            wp_nav_menu( array(
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
