           
            <div id="sidebar">
                <!-- For Widgets -->
                <?php
                    dynamic_sidebar( 'Footer' );
                ?>
            </div>
            
            
        <div id="footer-Background"> 
            <div id="footer" class="center">

                
                <div id="socialMedia">
                    <a href="https://www.facebook.com/DigitaleMedien.Furtwangen" target="_blank"><img src="<?php echo(get_template_directory_uri()); ?>/PlugIns/SocialMediaIcons/F_icon.svg" alt="Facebook"> </a>
                    <a href="https://www.xing.com/communities/groups/digitale-medien-hochschule-furtwangen-18eb-1019108" target="_blank"><img src="<?php echo(get_template_directory_uri()); ?>/PlugIns/SocialMediaIcons/XING.svg" alt="Xing"> </a>
                    <a href="https://vimeo.com/dmfurtwangen" target="_blank"><img src="<?php echo(get_template_directory_uri()); ?>/PlugIns/SocialMediaIcons/Vimeo.svg" alt="Vimeo"> </a>
                </div>

                <nav id="footernav">
                        <?php wp_nav_menu( array('theme_location' => 'footer-menu' )); ?>
                </nav>  
            </div>
        </div><!-- ende footer -->
    </div><!-- vertical-center -->
</div><!-- wrapper -->   
 
<?php wp_footer(); ?> <!-- For PlugIns -->


<?php
    include_once "tracking.php";
?>

</body>
</html>
