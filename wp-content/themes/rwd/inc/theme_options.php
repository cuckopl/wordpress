<?php
/* Theme options */
add_action('admin_init','init_theme_options');
add_action('admin_menu','setup_theme_admin_menus');

function setup_theme_admin_menus(){
	add_submenu_page('themes.php','Opcje motywu','motyw - opcje','manage_options','motyw_options','theme_options');
}

function init_theme_options(){
	register_setting('sk_theme_options','footer_text');
}

function theme_options(){
?>
<div class="wrap">
	<?php screen_icon('themes'); ?><h2>Opcje motywu</h2>
    
    <form method="post" action="options.php">
    
    <?php settings_fields('sk_theme_options'); ?>
    
    	<table class="form-table">
        	<tr valign="top">
            	<th scope="row">
                	<label for="footer_text">
					Tekst w stopce
					</label>
`					<input type="text" name="footer_text" value="<?php echo get_option('footer_text'); ?>"/>
                </th>
            </tr>
        </table>
        <p class="submit">
        	<input type="submit" class="button-primary" value="<?php _e('Save Changes'); ?>" />
        </p>
    </form>
    
</div>


<?php }