<?php  get_header();  ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    <?php the_content(); ?>
    

<?php endwhile; else: ?>
	<p><?php _e('Brak wpisów.'); ?></p>
<?php endif; ?>

<?php  get_footer();  ?>