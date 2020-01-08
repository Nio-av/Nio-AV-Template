<?php get_header(); ?>
<main>

<?php
function IsACategorySelected(  ){
    foreach ( get_categories( ) as $category ) {
        if( get_category( get_query_var( 'cat' ) ) ->term_id == $category->term_id){
            return true;
        }
    }
}
?>


<!-- Kategorien als breites Menü anzeigen -->
<div id="category-Background">
    <a name="catnav-anchor"></a>
    <nav id="category" class="center">

        <div class="btn-group btn-group-justified" role="group">

        <?php

            $thisTrueCat = get_category( get_query_var( 'cat' ) );


            $args = array(
                'orderby'       => 'name',
                'hide_empty'    => 1,
                'parent'        => 0,
              );
            $categories = get_categories( $args );
            foreach ( $categories as $category ) { ?>
                <a class="btn btn-info
                <?php if ($thisTrueCat->term_id == $category->term_id) { ?> active<?php } ?>
                " role="button"
                <?php
                echo $category->current_category  . '" href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a>';
            }
        ?>


        </div>



    </nav>
</div>







<!-- eine einfache Navigation innerhalb der unterkategorien -->
    <!-- GoBack-Button -->
    <?php
    $queried = $wp_query->get_queried_object();
    //echo 'parent: ' . category_has_parent($tid);
        // Button: GoBack
        if(IsACategorySelected() == true && $queried->category_parent){
            echo '<div class="center">';
            echo '<a href="../';

            echo '" id="back-Nav">';
            echo '<span class="glyphicon glyphicon-chevron-left"></span>';
            echo '<p class="rotate">Zurück</p>';
            echo '</a>';
            echo '</div>';
        }
    ?>
    <!-- open subcategory Selector -->
    <div class="post-Background">
        <div class="post center">
            <div id="subcategory-selector">
                <!--
                <?php
                    $args = array(
                        'show_count'         => 1,
                        'hide_empty'         => 0,
                        'category_description' => 0,
                        'title_li'           => __( '' ),
                        'child_of'           => $thisTrueCat->term_id,
                    );


                    wp_list_categories($args);
                    echo single_cat_title();
                    echo category_description();
                ?>
                -->




                 <?php

                 function get_term_post_count( $taxonomy = 'category', $term = '', $args = [] )
                  {
                      // Lets first validate and sanitize our parameters, on failure, just return false
                      if ( !$term )
                          return false;

                      if ( $term !== 'all' ) {
                          if ( !is_array( $term ) ) {
                              $term = filter_var(       $term, FILTER_VALIDATE_INT );
                          } else {
                              $term = filter_var_array( $term, FILTER_VALIDATE_INT );
                          }
                      }

                      if ( $taxonomy !== 'category' ) {
                          $taxonomy = filter_var( $taxonomy, FILTER_SANITIZE_STRING );
                          if ( !taxonomy_exists( $taxonomy ) )
                              return false;
                      }

                      if ( $args ) {
                          if ( !is_array )
                              return false;
                      }

                      // Now that we have come this far, lets continue and wrap it up
                      // Set our default args
                      $defaults = [
                          'posts_per_page' => 1,
                          'fields'         => 'ids'
                      ];

                      if ( $term !== 'all' ) {
                          $defaults['tax_query'] = [
                              [
                                  'taxonomy' => $taxonomy,
                                  'terms'    => $term
                              ]
                          ];
                      }
                      $combined_args = wp_parse_args( $args, $defaults );
                      $q = new WP_Query( $combined_args );

                      // Return the post count
                      return $q->found_posts;
                  }

                  $currentCategory = get_category( get_query_var( 'cat' ) )->term_id;

                  echo "Category Counter: " . get_term_post_count( 'category', $currentCategory);
                  echo "<br>";
                  echo "current_category: " . get_category( get_query_var( 'cat' ) )->term_id;

                    foreach ( $categories as $category ) {
                        if ($thisTrueCat->term_id == $category->term_id) {
                            /* Link to Parent-Category */

                            echo '<div id="child-category-selector" class="list-group">';


                            /* Category Selector */
                            $thisTrueCat = get_category( get_query_var( 'cat' ) );



                            $args = array(
                                'orderby'       => 'count',
                                'order'         => 'desc',
                                'hide_empty'    => 0,
                                'child_of'           => $thisTrueCat->term_id,
                              );
                            $categories = get_categories( $args );
                            foreach ( $categories as $category ) {
                                echo '<a href="' . get_category_link( $category->term_id ) . '" class="list-group-item';
                                if ($thisTrueCat->term_id == $category->term_id) {
                                    echo ' active';
                                }
                                echo '"> ';
                                echo '<span class="badge">' . $category->count . '</span>';
                                echo '<h4 class="list-group-item-heading">';
                                echo  $category->name . '</h4>' ;
                                echo '<p class="list-group-item-text">' . $category->description . '</p>';

                                echo '</a>';

                                ?>


                                <?php
                            }
                            echo '</div>';

                        }
                    }
                ?>
            </div> <!-- close subcategory-selector -->





            <?php
                if(IsACategorySelected() == true){
                    echo '<div id="AllPostings">';
                }
            ?>

            <!-- ggf. Link zur seite vorherige Beiträge -->
            <?php previous_posts_link(); ?>

                <!-- die Beiträge ausgeben -->
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <article class="window post">
                    <section>
                        <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                        <?php the_excerpt() ?>

                        <a href="<?php the_permalink() ?>"><span class="glyphicon glyphicon-chevron-right"></span> weiterlesen</a>
                    </section>
                </article>

                <?php endwhile; endif;

            //ggf. Link Weitere Postings


            // <!-- verhindern von ineinanderlaufenden text -->
            echo '<div class="clear"></div>';
            next_posts_link();
            // echo '#catnav-anchor';

            if(IsACategorySelected() == true){
                echo '</div>'; //close AllPostings
            }
            ?>



        </div> <!-- Close Post Center -->
    </div> <!-- Close Post BAckground -->


</main>


<?php get_footer(); ?>
