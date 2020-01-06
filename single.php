<?php get_header(); ?>

<div id="postinformation" class="center">
    <nav>
        <?php
            $categories = get_the_category();
            $separator = ' // ';
            if($categories){
                foreach($categories as $category) {
                    $output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>' . $separator;
                }
            echo trim($output, $separator);
            }
        ?>
    </nav>

</div>

<?php get_template_part( 'page' ); ?>

<?php get_footer(); ?>
