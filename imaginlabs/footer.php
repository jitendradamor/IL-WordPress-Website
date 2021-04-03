    <div class="footer">
        <div class="wrapper">
            <p>&copy; 2021 <a href="<?php echo esc_url(home_url('/')); ?>">ImaginLabs</a> All rights reserved.</p>
        </div>
    </div><!-- EOF : footer ID -->

</div><!-- EOF : main ID -->
<?php wp_footer(); ?>


    <?php
    if (is_user_logged_in() && !current_user_can('administrator') && !is_admin()) {
        ?>
        <style>
            #menu-header-menu li.profile-link,
            #menu-header-menu li.logout-link{
                display: inline-block;
            }
            #menu-header-menu li.login,
            #menu-header-menu li.register{
                display: none;
            }
        </style>
    <?php
    }
    ?>
 
</body>
</html>