<div class="wrap">
    <h2> <?php _e('BSALA Settings', 'bp-show-activity-liked-avatars'); ?></h2>
    <h2 class="nav-tab-wrapper">
	<a href="?page=bsala_settings" class="nav-tab nav-tab-active"><?php _e('Settings', 'bp-show-activity-liked-avatars');?></a>
	<a href="https://paaz.ir/donate" class="nav-tab" style="background:#6BA40B;color:#fff;"><?php _e('Donate', 'bp-show-activity-liked-avatars');?></a>
</h2>
    <table class="form-table">
        <form action="" method="post">
            <tbody>
                <tr>
                    <th>
                        <?php _e('Help image', 'bp-show-activity-liked-avatars');?>
                    </th>
                    <td>
                        <?php
echo '<img src="' . plugins_url( 'images/help.png', __FILE__ ) . '" > ';
?> </td>
                </tr>
                <tr>
                    <th>
                        <?php _e('Avatar size', 'bp-show-activity-liked-avatars');?>
                    </th>
                    <td>
                        <input type="text" name="bsala_avatar_size" value="<?php echo get_option( " bsala_avatar_size " ); ?>" />
                        <p class="description">
                            <?php _e('Set your custom size for each avatar (eg. 50)', 'bp-show-activity-liked-avatars');?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?php _e('Custom Title', 'bp-show-activity-liked-avatars');?>
                    </th>
                    <td>
                        <input type="text" name="bsala_custom_title" value="<?php echo get_option( " bsala_custom_title " ); ?>" />
                        <p class="description">
                            <?php _e('Set your custom title for the avatars - No.1 in image (eg. People liked this post) ', 'bp-show-activity-liked-avatars');?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?php _e('Minimum number of avatars', 'bp-show-activity-liked-avatars');?>
                    </th>
                    <td>
                        <input type="text" name="bsala_min_avatar_no" value="<?php echo get_option( " bsala_min_avatar_no " ); ?>" />
                        <p class="description">
                            <?php _e('How many avatars do you like to show at first? - No.2 in image (eg. 5)', 'bp-show-activity-liked-avatars');?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?php _e('Maximum number of avatars', 'bp-show-activity-liked-avatars');?>
                    </th>
                    <td>
                        <input type="text" name="bsala_max_avatar_no" value="<?php echo get_option( " bsala_max_avatar_no " ); ?>" />
                        <p class="description">
                            <?php _e('How many avatars do you like to show when user click on more button?', 'bp-show-activity-liked-avatars');?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?php _e('Text for more avatars', 'bp-show-activity-liked-avatars');?>
                    </th>
                    <td>
                        <input type="text" name="bsala_text_for_more" value="<?php echo get_option( " bsala_text_for_more " ); ?>" />
                        <p class="description">
                            <?php _e('You can write any text to show after avatars if there is anymore - No.3 in image (eg. More avatars)', 'bp-show-activity-liked-avatars');?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?php _e('Custom CSS', 'bp-show-activity-liked-avatars');?>
                    </th>
                    <td>
                        <textarea name="bsala_custom_style" rows="4" cols="50">
                            <?php echo get_option( "bsala_custom_style" );  ?>
                        </textarea>
                        <p class="description">
                            <?php _e('Put your custom css here. CSS Classes:', 'bp-show-activity-liked-avatars');?>
                        </p>
                        <p class="description">bsala-fav-avatar</p>
                        <p class="description">bsala-avatars-list</p>
                        <p class="description">bsala-min-fav-box</p>
                        <p class="description">bsala-max-fav-box</p>
                        <p class="description">bsala-more-avatars-button</p>                      
                    </td>
                </tr>
                <tr>
                    <th>
                        <input class="button-primary" type="submit" name="bsala_submit" value="<?php _e('Save', 'bp-show-activity-liked-avatars');?>" class="button" /> </th>
                </tr>
            </tbody>
        </form>
    </table>
    <a href="https://paaz.ir">
        <?php _e('Created By PAAZ', 'bp-show-activity-liked-avatars');?>
    </a>
</div>
