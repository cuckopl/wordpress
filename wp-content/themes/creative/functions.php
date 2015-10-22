<?php
/** Theme Name	: Creative **/

	/* Theme Core Functions and Codes */
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'creative_header_image_width', 1583 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'creative_header_image_height', 424 ) );
	require( get_template_directory() . '/functions/menu/default_menu_walker.php');
	require( get_template_directory() . '/functions/menu/creative_nav_walker.php');
	require(get_template_directory().'/customizer.php');
	require('default_options.php');
	//require('reset_options.php');
	
	/*After Theme Setup*/
	add_action( 'after_setup_theme', 'creative_head_setup' );
	function creative_head_setup()
	{	global $content_width;
		//content width
		if ( ! isset( $content_width ) ) $content_width = 750; //px
		load_theme_textdomain( 'creative', get_template_directory() . '/core/lang' );
		add_theme_support( 'post-thumbnails' ); //supports featured image
		// This theme uses wp_nav_menu() in one location.
		register_nav_menu( 'primary', __( 'Primary Menu', 'creative' ) );
		add_editor_style();
		// theme support
		$args = array('default-color' => '000000',);
		add_theme_support( 'custom-background', $args);
		add_theme_support( 'custom-header');
		add_theme_support( 'automatic-feed-links');
        add_theme_support( 'title-tag');
	}
	
	if ( ! function_exists( '_wp_render_title_tag' ) ) {
	function theme_slug_render_title() {
?>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php
	}
	add_action( 'wp_head', 'theme_slug_render_title' );
	}
/*** Excerpt More ***/
add_filter('excerpt_more', 'creative_excerpt_more');
function creative_excerpt_more($more) {
	global $post;
	return '<footer class="post-footer"><a href="'.get_permalink($post->ID).'" class="btn btn-color">'.__("Read More","creative").'</a></footer>';
}
add_filter( 'the_content_more_link', 'creative_read_more_link' );
/*** Read More ***/
function creative_read_more_link() {
	global $post;
return '<footer class="post-footer"><a href="'.get_permalink($post->ID).'" class="btn btn-color">'.__("Read More","creative").'</a></footer>';
}
/*** Page pagination ***/
function creative_page_nav_link(){ ?>
	<ul class="pager">
		<li class="previous"><?php previous_post_link('%link'); ?></li>
		<li class="next"><?php next_post_link('%link'); ?></li>
	</ul><?php                         
}
/****--- Navigation for Author, Category , Tag , Archive ---***/
	function creative_navigation() { ?>
	<ul class="pager">
		<?php posts_nav_link(); ?>
	</ul>
<?php }
/*
* creative widget area
*/
add_action( 'widgets_init', 'creative_widgets_init');
function creative_widgets_init() {
/*sidebar*/
register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'creative' ),
		'id' => 'sidebar-primary',
		'description' => __( 'The primary widget area', 'creative' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="title">',
		'after_title' => '</h3>'
	) );
register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'creative' ),
		'id' => 'footer-widget-area',
		'description' => __( 'footer widget area', 'creative' ),
		'before_widget' => ' <section class="col-lg-3 col-md-3 col-xs-12 col-sm-3 footer-one wow fadeIn">',
							'after_widget'  => '</section>',
							'before_title'  => '<h3 class="light">',
							'after_title'   => '</h3>'
	) );
}
function creative_scripts()
{
	// Google fonts - witch you want to use - (rest you can just remove)
	wp_enqueue_style('OpenSans', '//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800');
	wp_enqueue_style('Raleway', '//fonts.googleapis.com/css?family=Raleway:100,200,300,700,800,900');
	// CSS
	wp_enqueue_style('bootstrap', get_template_directory_uri() .'/css/bootstrap.css');
	wp_enqueue_style('bootstrap-theme', get_template_directory_uri() . '/css/bootstrap-theme.css');
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/fonts/font-awesome/css/font-awesome.css');
	wp_enqueue_style('animations', get_template_directory_uri() . '/css/animations.css');
	wp_enqueue_style('superfish', get_template_directory_uri() . '/css/superfish.css');
	wp_enqueue_style('slider-style', get_template_directory_uri() . '/css/slider/style.css');
	wp_enqueue_style('custom', get_template_directory_uri() . '/css/slider/custom.css');
	wp_enqueue_style('prettyPhoto', get_template_directory_uri() . '/css/prettyPhoto.css');
	wp_enqueue_style('mainStyle', get_stylesheet_uri() );
	wp_enqueue_style('green', get_template_directory_uri() . '/css/green.css');
	wp_enqueue_style('theme-responsive', get_template_directory_uri() . '/css/theme-responsive.css');

	// JS
	wp_enqueue_script('jquery.min', get_template_directory_uri() .'/js/jquery.min.js');
	wp_enqueue_script('modernizr-2.6.2.min', get_template_directory_uri() .'/js/modernizr-2.6.2.min.js');
	wp_enqueue_script('jquery-ui', get_template_directory_uri() .'/js/jquery-ui.js');
	wp_enqueue_script('bootstrap', get_template_directory_uri() .'/js/bootstrap.js');
	wp_enqueue_script('ba-cond.min', get_template_directory_uri() . '/js/slider/jquery.ba-cond.min.js');
	wp_enqueue_script('slitslider', get_template_directory_uri() . '/js/slider/jquery.slitslider.js');
	wp_enqueue_script('jquery.parallax', get_template_directory_uri() .'/js/jquery.parallax.js');
	wp_enqueue_script('jquery.wait', get_template_directory_uri() .'/js/jquery.wait.js');
	wp_enqueue_script('jquery.bxslider.min', get_template_directory_uri() .'/js/jquery.bxslider.min.js');
	wp_enqueue_script('jquery.prettyPhoto', get_template_directory_uri() .'/js/jquery.prettyPhoto.js');
	wp_enqueue_script('superfish', get_template_directory_uri() .'/js/superfish.js');
	wp_enqueue_script('tytabs', get_template_directory_uri() .'/js/tytabs.js');
	wp_enqueue_script('jflickrfeed', get_template_directory_uri() .'/js/jflickrfeed.js');
	wp_enqueue_script('knob', get_template_directory_uri() .'/js/jquery.knob.js');
	wp_enqueue_script('imagesloaded.pkgd.min', get_template_directory_uri() .'/js/imagesloaded.pkgd.min.js');
	wp_enqueue_script('wow', get_template_directory_uri() .'/js/wow.js');
	wp_enqueue_script('masonary', get_template_directory_uri() .'/js/masonry.pkgd.min.js');
	wp_enqueue_script('custom', get_template_directory_uri() .'/js/custom.js');
	require('custom.php');
	if ( is_singular() ) wp_enqueue_script( "comment-reply" );

}
add_action('wp_enqueue_scripts', 'creative_scripts');
?>
<?php
/*** Comment Function ***/ 
function creative_comments($comments, $args, $depth){
	$GLOBALS['comment'] = $comments;
	extract($args, EXTR_SKIP);
	if ( 'div' == $args['style'] ){
	$tag = 'div';
	$add_below = 'comment';
	} else{
	$tag = 'li';
	$add_below = 'div-comment';
	} ?>
	<<?php echo $tag; ?>>
		<div <?php comment_class( empty( $args['has_children'] ) ? 'child' : 'parent' ,'comment') ?> id="<?php comment_ID() ?>" >
			<div class="">
				<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comments, 80 );?>
			</div>
			<div class="comment-des">
				<div class="arrow-comment">
					<div class="comment-by">
						<strong><?php printf(  '%s', get_comment_author_link() ); ?></strong><span class="date"><?php printf( __('%1$s at %2$s','creative'), get_comment_date(),  get_comment_time() ); ?><?php edit_comment_link( __( '(Edit)','creative' ), '  ', '' );?></span><?php
						if ( $comments->comment_approved == '0' ) : ?>
							<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ,'creative'); ?></em><br />
							</div><?php
						else: ?>
					<span class="reply"><?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></span>
				</div><?php
				comment_text(); ?>
			</div>
			<div class="clearfix"></div><?php
			endif; ?>
		</div><?php
}
/*** Custom Excerpt ***/
function custom_excerpt_length( $length ) {
	return 49;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
?>
<?php
/* Breadcrumbs  */
	function creative_breadcrumbs() {
    $delimiter = '&#173; &#62; &#173;';
	$pre_text = __('You are Now on: ', 'creative');
    $home = __('Home','creative'); // text for the 'Home' link
    $before = '<li>'; // tag before the current crumb
    $after = '</li>'; // tag after the current crumb
    echo '<div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
					<div class="breadcrumbs pull-right">
						<ul>';
    global $post;
    $homeLink = home_url();
    echo '<li>' . $pre_text . '<a href="' . $homeLink . '">' . $home . '</a></li>' . $delimiter . ' ';
    if (is_category()) {
        global $wp_query;
        $cat_obj = $wp_query->get_queried_object();
        $thisCat = $cat_obj->term_id;
        $thisCat = get_category($thisCat);
        $parentCat = get_category($thisCat->parent);
        if ($thisCat->parent != 0)
            echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
        echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
    } elseif (is_day()) {
        echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
        echo '<li><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ' . $delimiter . ' ';
        echo $before . get_the_time('d') . $after;
    } elseif (is_month()) {
        echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
        echo $before . get_the_time('F') . $after;
    } elseif (is_year()) {
        echo $before . get_the_time('Y') . $after;
    } elseif (is_single() && !is_attachment()) {
        if (get_post_type() != 'post') {
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
            echo '<li>' . $pre_text . '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->rewrite['slug'] . '</a></li> ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        } else {
            $cat = get_the_category();
            $cat = $cat[0];
            //echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo $before . get_the_title() . $after;
        }
    } elseif (!is_single() && !is_page() && get_post_type() != 'post') {
        $post_type = get_post_type_object(get_post_type());
        echo $before . $post_type->labels->singular_name . $after;
    } elseif (is_attachment()) {
        $parent = get_post($post->post_parent);
        $cat = get_the_category($parent->ID);
        echo '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_page() && !$post->post_parent) {
        echo $before . get_the_title() . $after;
    } elseif (is_page() && $post->post_parent) {
        $parent_id = $post->post_parent;
        $breadcrumbs = array();
        while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
            $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        foreach ($breadcrumbs as $crumb)
            echo $crumb . ' ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_search()) {
        echo $before . 'Search results for "' . get_search_query() . '"' . $after;
    } elseif (is_tag()) {
        echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
    } elseif (is_author()) {
        global $author;
        $userdata = get_userdata($author);
        echo $before . 'Articles posted by ' . $userdata->display_name . $after;
    } elseif (is_404()) {
        echo $before . 'Error 404' . $after;
    }
    if (get_query_var('paged')) {
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            echo ' (';
        //echo __('Page', 'creative') . ' ' . get_query_var('paged');
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            echo ')';
    }
    echo '</div></div></ul>';
	}
?>
