<?php
add_action('admin_menu', 'bsala_admin_settings_page');
function bsala_admin_settings_page()
{
	add_submenu_page('options-general.php', 'BSALA', __('BSALA Settings', 'bp-show-activity-liked-avatars') , 'edit_others_posts', 'bsala_settings', 'bsala_settings_page');
}

function bsala_settings_page()
{
	include 'html-admin-settings.php';

	if (isset($_POST['bsala_submit'])) {
		update_option("bsala_avatar_size", $_POST['bsala_avatar_size']);
		update_option("bsala_custom_title", $_POST['bsala_custom_title']);
		update_option("bsala_min_avatar_no", $_POST['bsala_min_avatar_no']);
		update_option("bsala_max_avatar_no", $_POST['bsala_max_avatar_no']);
		update_option("bsala_custom_style", $_POST['bsala_custom_style']);
		update_option("bsala_text_for_more", $_POST['bsala_text_for_more']);
	}

	$bsala_avatar_size = get_option("bsala_avatar_size");
	$bsala_custom_title = get_option("bsala_custom_title");
	$bsala_min_avatar_no = get_option("bsala_min_avatar_no");
	$bsala_max_avatar_no = get_option("bsala_max_avatar_no");
	$bsala_text_for_more = get_option("bsala_text_for_more");
	$bsala_custom_style = get_option("bsala_custom_style");

}
