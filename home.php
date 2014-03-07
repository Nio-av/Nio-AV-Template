<?php get_header(); ?>



<!--
	<link href="<?php echo(get_template_directory_uri()); ?>/frameworks/Parallax-JS-master/css/reset.css"  rel="stylesheet" type="text/css" />
	
	
	<link href="<?php echo(get_template_directory_uri()); ?>/frameworks/Parallax-JS-master/css/chrome.css" rel="stylesheet" type="text/css" />
	
	


	<script type="text/javascript" src="<?php echo(get_template_directory_uri()); ?>/frameworks/Parallax-JS-master/js/side-nav.js"></script>
	<script type="text/javascript" src="<?php echo(get_template_directory_uri()); ?>/frameworks/Parallax-JS-master/js/backgrounds.js"></script>
	<script type="text/javascript" src="<?php echo(get_template_directory_uri()); ?>/frameworks/Parallax-JS-master/js/kinetics.js"></script>
	
	<!-- parallax.js really screws with the DOM, so make sure it's included last so other things don't notice :) --
	<script type="text/javascript" src="<?php echo(get_template_directory_uri()); ?>/frameworks/Parallax-JS-master/js/parallax.js"           ></script>
	
	
-->



<?php previous_posts_link(); ?>



<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


	<!-- this is to make the page's vertical scrollbar appear the correct height -->
	<div id="mock-scroller"></div>
	<ul id="nav"></ul>

	<div id="content">
		
		
		<?php
		if (has_post_thumbnail()) {// check if the post has a Post Thumbnail assigned to it.
			$meinbild = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
			echo('<img class="postimage" src="');
			print($meinbild[0]);
			echo('" anim-detached="true" />');
		}
		?>
	
<article class="window post">
		
	
	<section>
		
		<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

		<?php the_content() ?>

</section>
</article>

<?php endwhile; endif; ?>


<?php next_posts_link(); ?>


</div>

<script type="text/javascript" >
	$('article').blurjs({
		source : '.postimage',
		radius : 7,
		overlay : 'rgba(255,255,255,0.4)'
	}); 
</script>


<?php get_footer(); ?>