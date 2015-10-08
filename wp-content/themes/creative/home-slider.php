<?php
$wl_theme_options = creative_general_options();
?>
<div id="slider" class="sl-slider-wrapper tp-banner-container">
	<div class="sl-slider fullwidthbanner rslider tp-banner">
		<?php
		$dot=0;
		
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array( 'post_type' => 'post','paged'=>$paged, 'posts_per_page'=>-1, 'post_status'=>'publish');
		$post_data = new WP_Query( $args );
		
		while($post_data->have_posts()):
		
		$post_data->the_post();
		if(has_post_thumbnail() && $dot<3):
		global $more;
		$dot++;
		if ($dot % 2 == 0){
			$orientation = 'horizontal';
		}
		else{
			$orientation = 'vertical';
		} 
		$more = 0;
		?>
		<div class="sl-slide" data-orientation="<?php echo $orientation; ?>" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
			<div class="sl-slide-inner">			
				<?php 
				$defalt_arg =array('class' => "img-responsive bg-img"); 
				the_post_thumbnail('home_slider_thumb', $defalt_arg);
				?>
				<h2><?php the_title();?></h2>
				<blockquote><?php the_excerpt(); ?></blockquote>				
			</div>
		</div>
		<?php 
		endif;
		endwhile; 
	?>
	</div><!-- /sl-slider -->
	<nav id="nav-dots" class="nav-dots"><?php
		for($i=1; $i<=$dot; $i++) { ?>
			<span <?php echo $i==1 ? 'class="nav-dot-current"' : ""; ?>></span>
		<?php } ?>
	</nav>
</div><!-- /slider-wrapper -->