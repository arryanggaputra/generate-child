<?php
/**
 * The template for displaying the footer.
 *
 * @package GeneratePress
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>

	</div><!-- #content -->
</div><!-- #page -->

<?php
/**
 * generate_before_footer hook.
 *
 * @since 0.1
 */
do_action('generate_before_footer');
?>

<div <?php generate_do_element_classes('footer');?>>
	<?php
/**
 * generate_before_footer_content hook.
 *
 * @since 0.1
 */
do_action('generate_before_footer_content');

/**
 * generate_footer hook.
 *
 * @since 1.3.42
 *
 * @hooked generate_construct_footer_widgets - 5
 * @hooked generate_construct_footer - 10
 */
do_action('generate_footer');

/**
 * generate_after_footer_content hook.
 *
 * @since 0.1
 */
do_action('generate_after_footer_content');
?>
</div><!-- .site-footer -->

<?php
/**
 * generate_after_footer hook.
 *
 * @since 2.1
 */
do_action('generate_after_footer');

wp_footer();
?>
<?php
if (!is_front_page() && !is_home()) {
    ?>
<script type="text/javascript">
    var sidebar = new StickySidebar('.sidebar', {
        topSpacing: 20,
		bottomSpacing: 100,
		minWidth: 769
    });
</script>
<?php
}
?>

<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.defer=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-142494062-1', 'auto');
  ga('send', 'pageview');
</script>
<!-- End Google Analytics -->

</body>
</html>
