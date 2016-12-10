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
	<p class="footer-text">&bull; <?php _e('Copyright', 'nuovo'); ?> &copy; <?php echo date('Y'); ?> &bull; <a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a> &bull;</p>
</footer>
<?php wp_footer(); ?>
</body>
</html>
