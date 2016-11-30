<?php
/**
* Footer.php
*
* Footer file for Nuovo
*
* @author Jacob Martella
* @package Nuovo
* @version 2.3
*/
?>
</div><!--End Wrap-->
<footer class="footer">
	<?php wp_reset_query(); ?>
	<p class="footer-text"><?php _e('Copyright', 'nuovo'); ?> &copy; <?php echo date('Y'); ?> &bull; <a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a> &bull; <a href="http://jacobmartella.com/nuovo-wordpress-theme/" rel="nofollow">Nuovo</a> &bull; <?php wp_loginout(); ?><?php wp_register(' &bull; ', ''); ?></p>
</footer>
<?php wp_footer(); ?>
</body>
</html>
