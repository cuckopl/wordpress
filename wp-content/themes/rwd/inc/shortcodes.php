<?php

function showText(){
	return 'Tekst wyświetlany za pomocą shortcode';
}

function addInfo($atts,$content = null){
	return '<div class="alert alert-info">'.$content.'</div>';
}

add_shortcode('showtext','showText');
add_shortcode('info','addInfo');

add_filter('widget_text','do_shortcode');

?>