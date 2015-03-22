<?php get_header(); ?>

<div id="headline-background">
    <div id="headline" class="center">
        <h1><?php the_title(); ?></h1>
    </div>
</div>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
    <div id="content-Background">
        <!-- fuer eine statische Seite -->
        <div id="content"  class="center">
            <article>
                <h1> <?php the_title(); ?></h1>
                
                <?php
                    if (has_post_thumbnail()) {
                        the_post_thumbnail();
                    }
                ?>
                <?php the_content(); ?>
                
            </article>
        </div>
    </div>

<?php endwhile; endif; ?>







<?php get_footer(); ?>