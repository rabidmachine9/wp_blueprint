</div><!-- .site-content -->
    <footer class="site-footer">
        <?php
        /**
         * Functions hooked to site_footer action
         *
         * @hooked kp_footer_container_open - 0
         * @hooked kp_footer_widgets - 10
         * @hooked kp_footer_copyright - 20
         * @hooked kp_footer_container_close - 100
         */

        do_action('site_footer');
        ?>
    </footer><!-- .site-footer -->
</div><!-- .site -->
<?php wp_footer(); ?>
</body>
</html>