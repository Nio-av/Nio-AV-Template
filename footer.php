
<aside>
    <!-- For Widgets -->
    <?php
        dynamic_sidebar( 'Footer' );
    ?>
</aside>


<footer>
    <div class="centeredContent">


        <div class="socialMedia">
            <?php wp_nav_menu( array('theme_location' => 'socialMenu' )); ?>

        </div>

        <nav id="footernav">
                <?php wp_nav_menu( array('theme_location' => 'footerMenu' )); ?>
        </nav>
    </div>
</footer>

<?php wp_footer(); ?> <!-- For PlugIns -->


<?php
    include_once "tracking.php";
?>
<script src="<?php echo(get_template_directory_uri()); ?>/script.js" defer></script>

</body>
</html>
