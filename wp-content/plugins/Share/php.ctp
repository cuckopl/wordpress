Wordpress Creating Backend Settings site:

<?php
add_action('admin_menu', 'boj_myplugin_add_page'); // create Menu

function boj_myplugin_add_page() {
    add_options_page('My Plugin', 'My Plugin', 'manage_options', 'boj_myplugin', 'boj_myplugin_option_page'
    );
}
?>

 Draw the option page 
<?php

function boj_myplugin_option_page() {
    ?>
    <div class="wrap">
        <?php screen_icon(); ?>
        <h2>My plugin</h2>
        <form action="options.php" method="post">
            <?php settings_fields('boj_myplugin_options'); ?>
            <?php do_settings_sections('boj_myplugin'); ?>
            <input name="Submit" type="submit" value="Save Changes"/>
        </form>
    </div>
    <?php
}
?>

