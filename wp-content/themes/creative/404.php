<?php get_header(); ?>

<div class="breadcrumb-wrapper">
	<div class="pattern-overlay">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
					<h2 class="title"><?php _e('404 Error', 'creative'); ?></h2>
				</div>
				<div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
					<div class="breadcrumbs pull-right">
						<ul>
							<li><a href="<?php echo home_url( '/' ); ?>"><?php _e('You are Now on: Home','creative'); ?></a></li>
							<li><?php _e('&#173; &#62; &#173; 404 Error','creative'); ?></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="error_404">
				<h2><?php _e('404','weblizar'); ?></h2>
				<h4><?php _e('Whoops... Page Not Found !!!','weblizar'); ?></h4>
				<p><?php _e('We`re sorry, but the page you are looking for doesn`t exist.','weblizar'); ?></p>
				<p><a href="<?php echo home_url( '/' ); ?>"><button class="creative_send_button" type="submit"><?php _e('Go To Homepage','weblizar'); ?></button></a></p>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>