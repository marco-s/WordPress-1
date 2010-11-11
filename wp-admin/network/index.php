<?php
/**
 * Multisite administration panel.
 *
 * @package WordPress
 * @subpackage Multisite
 * @since 3.0.0
 */

/** Load WordPress Administration Bootstrap */
require_once( './admin.php' );

/** Load WordPress dashboard API */
require_once( ABSPATH . 'wp-admin/includes/dashboard.php' );

if ( !is_multisite() )
	wp_die( __( 'Multisite support is not enabled.' ) );

if ( ! current_user_can( 'manage_network' ) )
	wp_die( __( 'You do not have permission to access this page.' ) );

$title = __( 'Network Dashboard' );
$parent_file = 'index.php';

add_contextual_help($current_screen,
	'<p>' . __('Until WordPress 3.0, running multiple sites required using WordPress MU instead of regular WordPress. In version 3.0, these applications have merged. If you are a former MU user, you should be aware of the following changes:') . '</p>' .
	'<ul><li>' . __('Site Admin is now Super Admin (we highly encourage you to get yourself a cape!).') . '</li>' .
	'<li>' . __('Blogs are now called Sites; Site is now called Network.') . '</li></ul>' .
	'<p>' . __('This screen provides the network administrator with links to the screens for Sites and Users to either create a new site or user, or to search existing users and sites. Those screens are also accessible through the left-hand navigation in the Super Admin section.') . '</p>' .
	'<p><strong>' . __('For more information:') . '</strong></p>' .
	'<p>' . __('<a href="http://codex.wordpress.org/Super_Admin_Super_Admin_Menu" target="_blank">Documentation on Super Admin Menu</a>') . '</p>' .
	'<p>' . __('<a href="http://wordpress.org/support/" target="_blank">Support Forums</a>') . '</p>'
);

wp_dashboard_setup();

wp_enqueue_script( 'dashboard' );
wp_admin_css( 'dashboard' );
add_thickbox();

add_screen_option('layout_columns', array('max' => 4, 'default' => 2) );

require_once( '../admin-header.php' );

?>

<div class="wrap">
<?php screen_icon(); ?>
<h2><?php echo esc_html( $title ); ?></h2>

<div id="dashboard-widgets-wrap">

<?php wp_dashboard(); ?>

<div class="clear"></div>
</div><!-- dashboard-widgets-wrap -->

</div><!-- wrap -->

<?php include( '../admin-footer.php' ); ?>