<?php get_header(); ?>



<!-- Kategorien als breites Menü anzeigen -->
<div id="category-Background">
    <nav id="category" class="center">
        
        <div class="btn-group btn-group-justified" role="group">
        
        <?php

            $thisTrueCat = get_category( get_query_var( 'cat' ) ); 


            $args = array(
                'orderby'       => 'name',
                'hide_empty'    => 0,
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


<?php previous_posts_link(); ?>





<!-- eine einfache Navigation innerhalb der unterkategorien -->
    <div class="post-Background">
        <div class="post center">
            
            
            <div id="subcategorys">
                
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
                    
                    foreach ( $categories as $category ) {
                        if ($thisTrueCat->term_id == $category->term_id) {
                            echo '<div id="child-category-selector" class="list-group">';


                            $thisTrueCat = get_category( get_query_var( 'cat' ) ); 

                            $args = array(
                                'orderby'       => 'name',
                                'hide_empty'    => 0,
                                'child_of'           => $thisTrueCat->term_id,
                              );
                            $categories = get_categories( $args );
                            foreach ( $categories as $category ) {
                                echo '<a href="' . get_category_link( $category->term_id ) . '" class="list-group-item';
                                if ($thisTrueCat->term_id == $category->term_id) {
                                    echo ' active';
                                }
                                echo '"> <h4 class="list-group-item-heading">';
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
                
                
                
                

            </div>
            
            
            <?php

/*
            function IsACategorySelected( $category ){
                $categories = get_categories( );
                $thisTrueCat = get_category( get_query_var( 'cat' ) ); 
                foreach ( $categories as $category ) {
                    if ($thisTrueCat->term_id == $category->term_id) {
                        return false;
                    }
                    else{
                        return true;
                    }
                }
            }

            if(IsACategorySelected() == true){
                echo 'funktioniert nicht';
            }

            


            if(IsACategorySelected() == true){
                echo 'funktioniert nicht';
            }
            
            
            */
            ?>
            

            
            <?php

            $categories = get_categories( );
            $thisTrueCat = get_category( get_query_var( 'cat' ) ); 
            foreach ( $categories as $category ) {
                if ($thisTrueCat->term_id == $category->term_id) {
                    echo '<div id="AllPostings">';
                }
            }
            
            ?>
            
            
                <!-- die Beiträge ausgeben -->
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <article class="window post">
                    <section>	
                        <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                        <?php the_content() ?>

                        <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail();
                            }
                        ?>
                    </section>
                </article>

                <?php endwhile; endif; ?>
            
            <?php
            $categories = get_categories( );
            $thisTrueCat = get_category( get_query_var( 'cat' ) ); 
            foreach ( $categories as $category ) {
                if ($thisTrueCat->term_id == $category->term_id) {
                    echo '</div>';
                }
            }
            ?>
            
        </div>
    </div>



<?php next_posts_link(); ?>



<?php get_footer(); ?>