<?php get_header(); ?>


<div id="slider-wraper" class="container clearfix">
    <div class="flexslider"  style="min-height: 600px;">
        <ul class="slides" >
            <?php //query_posts('category_name=featured'); ?>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <li>
                        <div class="featured-slide">
                            <div class="featured-intro">
                                <h2><?php the_title(); ?></h2>
                                <p><?php
                                    $content = get_the_content();
                                    $content = substr($content, 0, 180);
                                    echo $content;
                                    ?></p>
                                <a href="<?php echo get_permalink(); ?>" class="btn-more"><?php
                                    _e('Click form more', 'motyw');
                                    ?></a>
                            </div>
                            <div class="featured-image">
                                <div style="max-width:400px;"> <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a></div>
                            </div>
                        </div>
                    </li>
                    <?php
                endwhile;
            else:
                ?>
                <p><?php _e('Brak wpisów', 'motyw') ?></p>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
        </ul>
    </div>
</div>

<div id="intro">
    <div class="container clearfix">
        <?php query_posts('posts_per_page=3&order=ASC'); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="intro-item">
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_excerpt(); ?></p>
                    <a href="<?php the_permalink() ?>" class="btn-more-intro"><?php
                        _e('More', 'motyw');
                        ?></a>
                </div>
                <?php
            endwhile;
        else:
            ?>
            <p><?php _e('Sorry, no posts matched your criteria.', 'motyw') ?></p>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
    </div>
</div>

<div id="content">
    <div class="container clearfix">
        <div id="promo-box">
            <div id="promo-box-wraper">
                <div id="promo-box-content">
                    <?php query_posts('posts_per_page=1'); ?>
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <?php the_excerpt(); ?>
                            <?php
                        endwhile;
                    else:
                        ?>
                        <p><?php _e('Brak wpisów') ?></p>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                </div>
            </div>
        </div>
        <div id="recent-posts">
            <h2><?php _e('Recent posts', 'motyw'); ?></h2>

            <ul>
                <?php query_posts('posts_per_page=3'); ?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <li>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <?php _e('Author') ?>: <?php the_author(); ?>
                            <?php _e('Publish Date') ?><?php the_date(); ?>
                        </li>
                        <?php
                    endwhile;
                else:
                    ?>
                    <p><?php
                        _e('Sorry, no posts matched your criteria.', 'motyw')
                        ?></p>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </ul>
        </div>
    </div>
</div>

<?php get_footer(); ?>