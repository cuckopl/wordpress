<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <link href="<?php bloginfo('stylesheet_url') ?>" rel="stylesheet">


        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->




        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.flexslider-min.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/custom.js"></script>

        <?php wp_head(); ?>

    </head>

    <body>

        <header id="header">
            <div id="top">
                <div class="top-content container clearfix">
                    <h1><a id="logo" href="<?php echo site_url(); ?>"></a></h1>
                    <div id="header-menu-wrap">
                        <nav id="menu-top">
                            <?php wp_nav_menu(array(
                                'theme_location' => 'header-menu'));
                            ?>
                        </nav>
                    </div>
                </div>  
            </div>

<?php if (!is_home()) { ?>
                <div class="container clearfix">
                    <hgroup class="top-title">
                        <h1 class="page-title"><?php the_title(); ?></h1>
                    </hgroup>
                </div>
<?php } ?>
        </header>


