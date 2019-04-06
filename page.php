<?php get_header(); ?>
<main>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    

    <article>

        <?php
            if (has_post_thumbnail()) {
                the_post_thumbnail();
            }
        ?>
        <?php the_content(); ?>

    </article>

<?php endwhile; endif; ?>



</main>



<?php get_footer(); ?>