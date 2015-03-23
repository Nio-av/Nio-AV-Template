<!DOCTYPE html>
<html lang="en">
<head>
  <title>
	<?php
    wp_title(); 
    if ( is_front_page() == false){
        echo " - ";
    }
    bloginfo('name');
	?>
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  
  
  <!-- For Ping -->
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>
<meta name="author" content="<?php the_author() ?>" />


<?php if ( !is_user_logged_in() ) /* Nur laden wenn User nicht eingeloggt ist. */ { ?>
    <!-- Für Trackingcode -->
        <?php include_once 'tracking.php'; ?>
<?php } ;?>




  
  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  
  
	<!--[if lt IE 9]>
		<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.js"></script>
	<![endif]-->
  
  
  
    <link rel="stylesheet" type="text/css" href="<?php echo(get_template_directory_uri()); ?>/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo(get_template_directory_uri()); ?>/css/footer.css">
    <link rel="stylesheet" type="text/css" href="<?php echo(get_template_directory_uri()); ?>/css/content.css">
    <link rel="stylesheet" type="text/css" href="<?php echo(get_template_directory_uri()); ?>/css/category.css">
</head>
<body>
    
    
    
    <div id="header-Background">
        <div id="header" class="center">
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
                  <a class="navbar-brand" href="<?php echo home_url(); ?>">
                            <?php bloginfo('name'); 
                            if( get_bloginfo('description') != false ){
                                echo " - ";
                                bloginfo('description');
                            }
                            ?>
                    </a>
                </div>

                    <?php /* Primary navigation */
                        wp_nav_menu( array(
                          'menu' => 'top_menu',
                          'depth' => 2,
                          'container' => 'div',
                          'container_id' => 'myNavbar',
                          'container_class' => 'collapse navbar-collapse',

                          'menu_class' => 'nav navbar-nav navbar-right',
                          //Process nav menu using our custom nav walker
                          'walker' => new wp_bootstrap_navwalker())
                        );
                    ?>
                </div>
            </nav>
        </div>
    </div>
</head>

    



    
    