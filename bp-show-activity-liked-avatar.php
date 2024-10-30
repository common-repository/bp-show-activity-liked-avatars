<?php
/* Plugin Name: BP Favorite Plus
* Plugin URI: https://wordpress.org/plugins/bp-show-activity-liked-avatars/
* Description: This plugin allows you to show user avatars below activity who liked that activity before
* Version: 2.2
* Author: Mahdi Amani
* Author URI: https://www.paaz.ir
* Tag: Buddypress, BP Show activity liked avatars,paaz,like,favorite,BP Favorite Plus
* Text Domain: bp-show-activity-liked-avatars
*/
define('BSALA_DIR', plugin_dir_path(__FILE__));
define('BSALA_URL', plugin_dir_URL(__FILE__));
define('BSALA_IMG_URL', trailingslashit(BSALA_URL . 'images'));

function bsala_load_user_css()
{
	wp_register_style('bsala_user_style', BSALA_URL . 'bsala_user_style.css');
	wp_enqueue_style('bsala_user_style');
}

add_action('wp_enqueue_scripts', 'bsala_load_user_css');

function bsala_load_user_script()
{
	wp_enqueue_script('jquery');
	wp_register_script('jq_bsala', BSALA_URL . 'jq_bsala.js');
	wp_enqueue_script('jq_bsala');
}
function bsala_plugin_add_settings_link( $links ) {
    $settings_link = '<a href="options-general.php?page=bsala_settings">' . __('BSALA Settings', 'bp-show-activity-liked-avatars') . '</a>';
		$donate_link = '<a href="https://paaz.ir/donate">' . __('Donate', 'bp-show-activity-liked-avatars') . '</a>';
    array_push( $links, $settings_link, $donate_link);
  	return $links;
}
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin", 'bsala_plugin_add_settings_link' );

add_action('wp_enqueue_scripts', 'bsala_load_user_script');

if (is_admin()) {
	require 'admin-settings.php';

}

function my_plugin_init()
{
	load_plugin_textdomain('bp-show-activity-liked-avatars', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}

add_action('init', 'my_plugin_init');
include_once (ABSPATH . 'wp-admin/includes/plugin.php');

if (is_plugin_active('buddypress/bp-loader.php')) {
	function bsala_get_users_fav($activity_id = '')
	{
		$bsala_avatar_size = get_option("bsala_avatar_size");
		$activity_id = bp_get_activity_id();
		global $wpdb;
		$query = "SELECT user_id FROM " . $wpdb->base_prefix . "usermeta WHERE meta_key = 'bp_favorite_activities' AND (meta_value LIKE '%:$activity_id;%' OR meta_value LIKE '%:\"$activity_id\";%') ";
		$users = $wpdb->get_results($query, ARRAY_A);
		foreach($users as $user) {
			$name = bp_get_profile_field_data(array(
				'field' => 1,
				'user_id' => $user['user_id']
			));
			$avatarurl = bp_core_fetch_avatar(array(
				'item_id' => $user['user_id'],
				'width' => $bsala_avatar_size,
				'height' => $bsala_avatar_size,
			));
			$link = bp_core_get_user_domain($user['user_id']);
			static $i = 0;
			$u_avatars[++$i] = '<li><a class="bsala-fav-avatar" href="' . $link . '">' . $avatarurl . '</a></li>';
		}
		$bsala_min_avatar_no = get_option("bsala_min_avatar_no") + 1;
		$bsala_max_avatar_no = get_option("bsala_max_avatar_no");
		$bsala_text_for_more = get_option("bsala_text_for_more");
		$bsala_custom_style = get_option("bsala_custom_style");
		$bsala_custom_title = get_option("bsala_custom_title");
		$bsala_main_fav_no = count($users);
		$bsala_more_fav_no = $bsala_main_fav_no - $bsala_min_avatar_no + 1;

		if (get_option("bsala_min_avatar_no") < $bsala_main_fav_no) {
			echo '<style>' . $bsala_custom_style . '</style><div class="bsala-min-fav-box" >' . count($u_avatars) . ' ' . $bsala_custom_title . '<ul  class="bsala-avatars-list" >';
			for ($x = 0; $x < $bsala_min_avatar_no ; $x++) {
				echo $u_avatars[$x];
			};
			echo ' + <a class="bsala-more-avatars-button">' . $bsala_more_fav_no . '   ' . $bsala_text_for_more . '</a></ul></div>';
			echo '<style>' . $bsala_custom_style . '</style><div class="bsala-max-fav-box" ><ul  class="bsala-avatars-list" >';
			for ($x = $bsala_min_avatar_no; $x < $bsala_max_avatar_no ; $x++) {
				echo $u_avatars[$x];
			};
			echo '</ul></div>';
		}
		else {
			if ($bsala_main_fav_no) {
				echo '<style>' . $bsala_custom_style . '</style><div class="bsala-min-fav-box" >' . count($u_avatars) . ' ' . $bsala_custom_title . '<ul  class="bsala-avatars-list" >' . implode($u_avatars) . '</ul></div>';
			}
		}
	}
}
else {
	function bsala_error_notice()
	{
		echo '<div class="error">
<p>You must need to install and active <strong><a href="' . site_url() . '/wp-admin/plugin-install.php?tab=search&type=term&s=buddypress&plugin-search-input=Search+Plugins">
Buddypress</strong></a> to use <strong>BP Show activity liked avatars </strong> plugin </p>
</div>';
	}

	add_action('admin_notices', 'bsala_error_notice');
}

add_filter('bp_activity_entry_meta', 'bsala_get_users_fav', 99);
