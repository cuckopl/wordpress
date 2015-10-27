
<div class="wrap">
    <h2>Welcome Screen Credits</h2>

</div>

<form method="POST" action="options.php">
    <?php settings_fields('asdsadsadsadasd-as-dsa-dsa-d-sad-sa'); ?>
    <?php do_settings_sections('asdsadsadsadasd-as-dsa-dsa-d-sad-sa'); ?>

    <div id="tabs">
        <h2 class="nav-tab-wrapper">
            <a href="#tabs-1" class="nav-tab nav-tab-active">General Settings</a>
            <a href="#tabs-2" class="nav-tab ">Settings</a>
            <a href="#tabs-3" class="nav-tab">Coś tam</a>
        </h2>

        <div class="tab"  id="tabs-1" method="POST" action="">
            <label> Min  </label>
            <input type="text" name="min" value="<?php echo esc_attr(get_option('min')); ?>">
            <label> Max  </label>
            <input type="text" name="max" value="<?php echo esc_attr(get_option('max')); ?>">

        </div>

        <div class="tab"  id="tabs-2">

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