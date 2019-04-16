           
<aside>
    <!-- For Widgets -->
    <?php
        dynamic_sidebar( 'Footer' );
    ?>
</aside>
            
            
<footer>
    <div class="center">


        <div id="socialMedia">
            <a href="//www.facebook.com/nico.tribu" target="_blank"><img src="<?php echo(get_template_directory_uri()); ?>/PlugIns/SocialMediaIcons/F_icon.svg" alt="Facebook"> </a>
            <a href="//www.xing.com/profile/Nicolas_Tribukait" target="_blank"><img src="<?php echo(get_template_directory_uri()); ?>/PlugIns/SocialMediaIcons/XING.svg" alt="Xing"> </a>
            <a href="//twitter.com/Nio_vs" target="_blank"><img src="<?php echo(get_template_directory_uri()); ?>/PlugIns/SocialMediaIcons/Twitter.svg" alt="Twitter"></a>
            <a href="//github.com/Nio-av" target="_blank"><img src="<?php echo(get_template_directory_uri()); ?>/PlugIns/SocialMediaIcons/GitHub.svg" alt="GitHub"></a>
            <a href="//vimeo.com/niovs" target="_blank"><img src="<?php echo(get_template_directory_uri()); ?>/PlugIns/SocialMediaIcons/Vimeo.svg" alt="Vimeo"> </a>
            <a href="//nio-av.de/kalender" target="_blank"><button type="button" class="btn btn-default btn-lg bootstrap-button"><span class="glyphicon glyphicon-calendar "></span></button></a>
        </div>

        <nav id="footernav">
                <?php //wp_nav_menu( array('theme_location' => 'footerMenu' )); ?>
                <?php wp_nav_menu( array('theme_location' => 'socialMenu' )); ?>
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
