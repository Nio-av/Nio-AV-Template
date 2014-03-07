<?php get_header(); ?>
<meta name="robots" content="noindex">


<article class="window page">
	
	<h1>Artikel vom Autor.</h1>

Diese Seite ist noch nicht fertig...

<?php 
// the query
$the_query = new WP_Query( $args ); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
  <!-- pagination here -->

<ul>

  <!-- the loop -->
 
 
    <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>



</ul>

<?php endwhile; endif; ?>



</article>


<?php get_footer(); ?>