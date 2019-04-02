<?php get_header(); ?>
<main>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
    <div id="content-Background">
        <!-- fuer eine statische Seite -->
        <div id="content"  class="center">
            <article>
                <div id="headline">
                    <h1> <?php the_title(); ?></h1>
                </div>
                
                <?php
                    if (has_post_thumbnail()) {
                        the_post_thumbnail();
                    }
                ?>
                <?php the_content(); ?>
                
                <!-- verhindern von ineinanderlaufenden text -->
                <div class="clear"></div>

            </article>
        </div>
    </div>

<?php endwhile; endif; ?>



</main>



<?php get_footer(); ?>