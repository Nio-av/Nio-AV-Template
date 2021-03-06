<?php get_header(); ?>
<main class="centeredContent grid">

<?php
function IsACategorySelected()
{
    foreach (get_categories() as $category) {
        if (get_category(get_query_var('cat')) ->term_id == $category->term_id) {
            return true;
        } else {
            return false;
        }
    }
}

$queried = $wp_query->get_queried_object();
//echo 'parent: ' . category_has_parent($tid);
// Button: GoBack
if (IsACategorySelected() == false && $queried->category_parent) {
    echo '<a class="back" href="../">Zurück</a>';
}



$thisTrueCat = get_category(get_query_var('cat'))->term_id;


$args = array(
    'orderby'       => 'name',
    'hide_empty'    => 1,
    'parent'        => 0,
  );
$categories = get_categories($args);
?>




<!-- eine einfache Navigation innerhalb der unterkategorien -->
    <!-- GoBack-Button -->
    <?php


    // <!-- open subcategory Selector -->



                 if (category_description($category_id)) {
                     echo "<h4 class='categoryDescription'>Beschreibung</h3>";
                     remove_filter('term_description','wpautop');
                     echo '<p class="categoryDescription">' . category_description($category_id) . "</p>";
                 }

                 function get_term_post_count($taxonomy = 'category', $term = '', $args = [])
                 {
                     // Lets first validate and sanitize our parameters, on failure, just return false
                     if (!$term) {
                         return false;
                     }

                     if ($term !== 'all') {
                         if (!is_array($term)) {
                             $term = filter_var($term, FILTER_VALIDATE_INT);
                         } else {
                             $term = filter_var_array($term, FILTER_VALIDATE_INT);
                         }
                     }

                     if ($taxonomy !== 'category') {
                         $taxonomy = filter_var($taxonomy, FILTER_SANITIZE_STRING);
                         if (!taxonomy_exists($taxonomy)) {
                             return false;
                         }
                     }

                     if ($args) {
                         if (!is_array) {
                             return false;
                         }
                     }

                     // Now that we have come this far, lets continue and wrap it up
                     // Set our default args
                     $defaults = [
                          'posts_per_page' => 1,
                          'fields'         => 'ids'
                      ];

                     if ($term !== 'all') {
                         $defaults['tax_query'] = [
                              [
                                  'taxonomy' => $taxonomy,
                                  'terms'    => $term
                              ]
                          ];
                     }
                     $combined_args = wp_parse_args($args, $defaults);
                     $q = new WP_Query($combined_args);

                     // Return the post count
                     return $q->found_posts;
                 }


                  $postsInCategorySubcategory = get_term_post_count('category', $thisTrueCat);

                  echo "<span class='counter counterDecription'>Category Counter: </span><span class='counter counterNumber'>" . $postsInCategorySubcategory . "</span>";

                    foreach ($categories as $category) {
                        if ($thisTrueCat == $category->term_id) {
                            /* Link to Parent-Category */

                            echo '<div id="child-category-selector">';
                            echo '<span class="percentageInformation">Die bisher von mir realisierten Projekte verteilen sich wie folgt in den entsprechenden Bereichen:</span>';




                            $args = array(
                                'orderby'       => 'count',
                                'order'         => 'desc',
                                'hide_empty'    => 0,
                                'child_of'           => $thisTrueCat,
                              );
                            $categories = get_categories($args);
                            foreach ($categories as $category) {
                                $percentageOfPosts =   (($category->count) / $postsInCategorySubcategory) * 100;
                                echo '<a class="grid" title="'. round($percentageOfPosts) .'% der Beiträge sind der Kategorie »' . $category->name . '« zugeordnet." href="' . get_category_link($category->term_id) . '">';
                                 ?>

                                <div class="process">
                                  <?php
                                  echo round($percentageOfPosts) . ' %'; ?>
                                </div>
                                <div class="processbar">
                                  <div class="bar" style="width:<?php echo $percentageOfPosts * 2 ?>%"></div>
                                </div>

                                <?php
                                echo '<h3>' . $category->name . '</h3>' ;
                                //echo '<progress value="' . $category->count . '" max="' . $postsInCategorySubcategory . '"></progress>';
                                //echo '<span class="badge">' . $category->count . '</span>';
                                echo '<p class="categoryDescription">' . $category->description . '</p>';

                                echo '</a>'; ?>


                                <?php
                            }
                            echo '</div>';
                        }
                    }
                ?>






            <?php
                wp_reset_query();
                if (IsACategorySelected() != false) {
                    echo '<div id="AllPostings">';
                }
            ?>






            <!-- ggf. Link zur seite vorherige Beiträge -->
            <?php previous_posts_link(); ?>

                <!-- die Beiträge ausgeben -->





                <?php

                //custom wp_query
                $args = array(
                 'posts_per_page' => -1,
                 'orderby' => 'date',
                 'order' => 'DESC',
                 'category__in' => get_category(get_query_var('cat'))->term_id
                );

                $wp_query = new WP_Query($args);

                ?>



                <div id="postsInCategory">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <a href="<?php the_permalink() ?>">
                    <section class="window post">
                        <h2><?php the_title(); ?></h2>
                        <p class="textexcerpt">
                          <?php echo get_the_excerpt() ?>
                        </p>

                        <span>weiterlesen</span>
                    </section>
                </a>

              <?php endwhile; endif; ?>

                </div>

            <?php

            //ggf. Link Weitere Postings


            // <!-- verhindern von ineinanderlaufenden text -->
            echo '<div class="clear"></div>';
            next_posts_link();
            // echo '#catnav-anchor';

            if (IsACategorySelected() != false) {
                echo '</div>'; //close AllPostings
            }
            ?>






</main>


<?php get_footer(); ?>
