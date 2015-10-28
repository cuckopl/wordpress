
<div class="wrap">
    <h2>Welcome Screen Credits</h2>

</div>

<form method="POST" action="options.php">
    <?php settings_fields(App\WordSynomPlugin::PLUGIN_NAME); ?>
    <?php do_settings_sections(App\WordSynomPlugin::PLUGIN_NAME); ?>

    <div id="tabs">
        <h2 class="nav-tab-wrapper">
            <a href="#tabs-1" class="nav-tab nav-tab-active">General Settings</a>
            <a href="#tabs-2" class="nav-tab ">Spinner Chief</a>
            <a href="#tabs-3" class="nav-tab">Notifications</a>
        </h2>
        <div class="tab"  id="tabs-1" method="POST" action="">
            <h4>Zakres długości syndykowanej:</h3>
                <table class="form-table">
                    <tr>
                        <th>
                            <label> Min  </label>
                        </th>
                        <td>
                            <input type="number" name="<?php echo $formFields['min'] ?>" value="<?php echo esc_attr(get_option($formFields['min'])); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label> Max  </label>
                        </th>
                        <td>
                            <input type="number" name="<?php echo $formFields['max'] ?>" value="<?php echo esc_attr(get_option($formFields['max'])); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>

                            <label> Anchor Text  </label>
                        </th>
                        <td>
                            <input type="text" name="<?php echo $formFields['anchor'] ?>" value="<?php echo esc_attr(get_option($formFields['anchor'])); ?>">
                        </td>
                    </tr>
                </table>
                <hr>

                </div>

                <div class="tab"  id="tabs-2">
                    <table class="form-table">
                        <tr>
                            <th>
                                <label> Hasło  </label>
                            </th>
                            <td>
                                <input type="password" name="<?php echo $formFields['password'] ?>" value="<?php echo esc_attr(get_option($forpasswordmFields['password'])); ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label> Login  </label>
                            </th>
                            <td>
                                <input type="text" name="<?php echo $formFields['login'] ?>" value="<?php echo esc_attr(get_option($formFields['login'])); ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label> Api Key  </label>
                            </th>
                            <td>
                                <input type="text" name="<?php echo $formFields['api'] ?>" value="<?php echo esc_attr(get_option($formFields['api'])); ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label> Testuj Połączenie </label>
                            </th>
                            <td>
                                <a href="/wp-admin/admin.php?page=my-submenu-slug" class="btn-danger">Test Połączenia</a>
                            </td>
                        </tr>
                    </table>
                    <hr>
                </div>

                <div class="tab"  id="tabs-3">

                </div>
        </div>
        <?php submit_button(); ?>
</form>


<script type="text/javascript">
    var $ = jQuery;
    $(function () {
        $('#tabs div.tab').hide();
        $('#tabs div.tab').first().show();
        $('#tabs a.nav-tab').click(function () {
            $('#tabs a.nav-tab').removeClass('nav-tab-active');
            $(this).addClass('nav-tab-active');
            var show = $(this).attr('href');
            $('#tabs div.tab').hide();
            $(show).show();
        });
    });
</script>