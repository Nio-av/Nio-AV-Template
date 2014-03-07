<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>



<style type="text/css" media="screen">

	body{
		
	<?php
		if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
		$meinbild = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full' );
	}
	?>
	background: url("<?php print($meinbild[0])?>") no-repeat center center fixed;	
	background-size: cover;
	background-repeat: no-repeat;

	}
</style>


<article class="window page">
	<h1> <?php the_title(); ?> </h1>
	<?php 
		if (is_single() == true){
			print('<p class="date">');
			the_date();
			print('</p>');
		}
	?>
	<?php the_content(); ?>
</article>


<script>$(".windows").blurjs({
  source: "body",
  radius: 9,
  overlay: "rgba(255, 255, 255, 0.3)"
})</script>



<div id="sidebar"></div><!-- sidebar -->

<?php endwhile; endif; ?>

<?php get_footer(); ?>