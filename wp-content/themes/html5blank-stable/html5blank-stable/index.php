<?php get_header(); ?>
<div class="container">



    <div class="row">


        <main role="main" class="col-md-9">
            <!-- section -->
            <section>
                <h1><?php _e('Latest Posts', 'html5blank'); ?></h1>

                <?php get_template_part('loop'); ?>

                <?php get_template_part('pagination'); ?>

            </section>
            <!-- /section -->
        </main>


        <section id="sidebar" class="col-md-3">
            <?php get_sidebar(); ?>
        </section>

    </div>



    <section id="fotter">
        <?php get_footer(); ?>
    </section>

</div>