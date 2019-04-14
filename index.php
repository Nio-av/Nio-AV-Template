<?php get_header(); ?>

<main>

<?php
if ( 'page' == get_option('show_on_front') && get_option('page_for_posts') && is_home() ) : the_post();
    $page_for_posts_id = get_option('page_for_posts');

    setup_postdata(get_page($page_for_posts_id));

    //echo(get_option('page_for_posts'));


    $page_id = get_page($page_for_posts_id);
    $page_data = get_page( $page_id );


    rewind_posts();
endif;
?>



<div id="content-Background">
    <!-- fuer eine statische Seite -->
    <div id="content"  class="center">
        <article>
            <div id="headline">
                <?php echo '<h1>'. $page_data->post_title .'</h1>';// echo the title ?>
            </div>


            <?php
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_option('page_for_posts') ), 'single-post-thumbnail' );
            if ( isset($image['0'])){
                echo '<img class="wp-post-image" src="';

                echo $image[0];
                echo '">';
            };
            ?>


            <?php the_content(); ?>


            <!-- verhindern von ineinanderlaufenden text -->
            <div class="clear"></div>

        </article>
    </div>
</div>



<!-- Nach hier include -->

<?php
//include_once 'category.php';
?>

<!-- ab hier normal -->



</main>

<?php get_footer(); ?>

<!-- hier war der footer -->