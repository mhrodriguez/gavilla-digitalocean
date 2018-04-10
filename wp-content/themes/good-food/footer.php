<?php
/**
 * @package 	WordPress
 * @subpackage 	Good Food
 * @version		1.0.0
 * 
 * Website Footer Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = good_food_get_global_options();
?>


		</div>
	</div>
</div>
<!-- _________________________ Finish Middle _________________________ -->
<?php 

get_sidebar('bottom');

?>
<a href="<?php echo esc_js("javascript:void(0)"); ?>" id="slide_top" class="cmsmasters_theme_icon_slide_top"><span></span></a>
</div>
<!-- _________________________ Finish Main _________________________ -->

<!-- _________________________ Start Footer _________________________ -->
<footer id="footer">
	<?php 
	get_template_part('theme-framework/theme-style' . CMSMASTERS_THEME_STYLE . '/template/footer');
	?>
</footer>
<!-- _________________________ Finish Footer _________________________ -->

<?php do_action('cmsmasters_after_page', $cmsmasters_option); ?>
</div>
<span class="cmsmasters_responsive_width"></span>
<!-- _________________________ Finish Page _________________________ -->

<?php do_action('cmsmasters_after_body', $cmsmasters_option); ?>
<?php wp_footer(); ?>
</body>
</html>
