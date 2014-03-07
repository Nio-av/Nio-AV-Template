<!DOCTYPE html>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.js"></script>
<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="<?php echo(get_template_directory_uri()); ?>/frameworks/fancyBox/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?php echo(get_template_directory_uri()); ?>/frameworks/fancyBox/jquery.fancybox.css?v=2.1.5" media="screen" />
<script src="<?php echo(get_template_directory_uri()); ?>/design.js"></script>


<script type="text/javascript" src="<?php echo(get_template_directory_uri()); ?>/frameworks/blur.js"></script>


<link href="<?php echo(get_template_directory_uri()); ?>/style.css" rel="stylesheet" type="text/css" />


<!--[if lt IE 9]>
	<h1 style="color:red; background-color:yellow";>Dein Webbrowser wird leider nicht mehr unterstützt, da er seit mindestens 5 Jahren veraltet ist. Probier doch Firefox aus.</h1>
<![endif]-->



<html lang="de">
	<head>
		<meta charset="UTF-8">
		<title><?php wp_title(); ?> - <?php bloginfo('name'); ?></title>
		
		
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<!-- For Ping -->

		<?php wp_head(); ?>
		<meta name="author" content="<?php the_author() ?>" />


        <?php if ( !is_user_logged_in() ) /* Nur laden wenn User nicht eingeloggt ist. */ { ?>
            <!-- Für Trackingcode -->
            <?php include_once 'tracking.php'; ?>
        <?php } ;?>

        

	</head>

	<body>
        
        
		<div id="header" class="window">
			
				<h1 id="pagelogo"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
				
				<nav id="pagenav">
					<?php wp_nav_menu(array('theme_location' => 'header-menu')); ?>
				</nav>

		</div>