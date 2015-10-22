<?php  get_header();  ?>

<div class="content-wrap">
    <div class="content container clearfix">
        <div class="row">
            <div class="page-content col-md-6">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                
                	<h2 class="cat-title"><?php single_cat_title(); ?></h2>
                    <p class="cat-desc"><?php echo category_description(); ?></p>
                    
                    <h2><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h2>
                    <?php  the_content(); ?>	
                 <?php endwhile; else: ?>
				<p><?php _e('Brak wpisów.'); ?></p>
				<?php endif; ?>
                
            </div>
            
<!-- Content End -->
            
            <div class="sidebar-widgets col-md-3">
            	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("sidebar_1") ) : ?>
                <?php endif; ?> 
            </div>
        </div>
    </div>
</div>

<?php  get_footer();  ?>
