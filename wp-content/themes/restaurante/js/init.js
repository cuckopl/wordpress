jQuery(window).load(function () {
    jQuery('.site-loader').fadeOut('slow');
    restaurante_menu_height();
});


function restaurante_menu_height(){
    var $logo_area_height = jQuery('#kt-logo-container').height();

    var $new_margin_top = ($logo_area_height/2)-10;
    jQuery('#kt-navigation').css('margin-top',$new_margin_top+'px');
}

function restaurante_restaurant_responsive_menu_add() {
    jQuery('#kt-navigation').slicknav({
        label: ''
    });
}
function restaurante_restaurant_remove_map_overlay() {
    jQuery('#map-overlay-link').click(function (e) {
        jQuery('#map-overlay').addClass('animated lightSpeedOut');
        return false;
    });
}

function restaurante_restaurant_get_slider() {
    jQuery('#italian_restaurant_slider_area').slippry({
        elements: 'div.italian_restaurant_slide',
        captions: false,
        controls: slider_params.controls,
        pager: slider_params.pager,
        transition: slider_params.transition,
        speed: parseInt(slider_params.speed),
        pause: parseInt(slider_params.pause),
        auto: slider_params.auto
    });

}

function restaurante_restaurant_same_height() {
    jQuery('.matchHeight').matchHeight();
}
function restaurante_restaurant_gallery_slider() {
    jQuery('.gallery-format-slider').each(function () {
        jQuery(this).owlCarousel({
            navigation: false,
            slideSpeed: 300,
            pagination: true,
            paginationSpeed: 400,
            singleItem: true,
            autoPlay: true,
            navigationText: ['<i class="fa fa-caret-left"></i>', '<i class="fa fa-caret-right"></i>']
        });

    });
}
function restaurante_restaurant_add_lightbox_to_galleries() {
    jQuery('.gallery').magnificPopup({
        delegate: '.gallery-item > div > a',
        type: 'image',
        gallery: {
            enabled: true
        }
    });
}
function restaurante_restaurant_post_sliders() {
    jQuery('.post-slider-container').each(function () {
        jQuery(this).owlCarousel({
            navigation: true,
            slideSpeed: 300,
            items: 1,
            pagination: false,
            paginationSpeed: 400,
            singleItem: true,
            navigationText: ['<i class="fa fa-caret-left"></i>', '<i class="fa fa-caret-right"></i>']
        });
    });
}
function restaurante_restaurant_post_carousel() {
    jQuery('.post-carousel-container').each(function () {
        var items = jQuery(this).attr('data-carousel-items');
        jQuery(this).owlCarousel({
            navigation: true,
            slideSpeed: 300,
            pagination: false,
            paginationSpeed: 400,
            items: items,
            itemsDesktop: [1199, 4],
            itemsDesktopSmall: [979, 2],
            itemsTablet: [768, 1],
            navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
        });
    });
}
function restaurante_restaurant_testimonials_carousel() {
    jQuery('.kt-sc-testimonial-carousel').each(function () {
        jQuery(this).owlCarousel({
            navigation: false,
            autoPlay: 5000,
            slideSpeed: 1000,
            items: 1,
            pagination: true,
            navigation: false,
            navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            paginationSpeed: 400,
            singleItem: true
        });
    });
}
function restaurante_restaurant_set_tiled_galleries() {
    jQuery('.kt-sc-tiled-gallery-container').imagesLoaded(function () {

        jQuery('.kt-sc-tiled-gallery-container').each(function () {

            jQuery(this).photosetGrid({
                gutter: '0px',
                highresLinks: true,

                onComplete: function () {
                    jQuery('.kt-sc-tiled-gallery-container').magnificPopup({
                        delegate: 'a',
                        type: 'image',
                        gallery: {
                            enabled: true
                        }
                    });
                }
            });

        });

    });
}
function restaurante_restaurant_member_social_show() {
    jQuery('.kt-sc-member-image').parent().hover(function () {
        jQuery(this).addClass('adde74Class');
        jQuery(this).addClass('animated pulse');
        jQuery(this).find('.kt-sc-member-socials').show('fast').addClass('animated' +
            ' zoomInRight');


    }, function () {
        jQuery(this).removeClass('adde74Class');
        jQuery(this).removeClass('animated pulse');
        jQuery(this).find('.kt-sc-member-socials').hide('fast').removeClass('animated' +
            ' zoomInRight');
    });
}

function restaurante_get_event_countdown(){
    //This countdown is till the end //
   jQuery('[data-countdown-to]').each(function() {
        var $this = jQuery(this), finalDate = jQuery(this).data('countdown-to');
        $this.countdown(finalDate, function(event) {
            $this.html(event.strftime(' <div class="days">' +
                '<span class="days_text">DAYS</span> ' +
                '<span class="days_number">%D</span> ' +
                '</div> ' +
                '<div class="hours">' +
                '<span class="hours_text">HOURS' +
                '</span>' +
                '<span class="hours_number">%H' +
                '</span_class> ' +
                '</div>' +
                 '<div class="minutes">' +
                '<span class="minutes_text">MINUTES' +
                '</span>' +
                '<span class="minutes_number">%M' +
                '</span>' +
                '</div>' +
                '<div class="seconds">' +
                '<span class="seconds_text">SECONDS</span>' +
                '<span class="seconds_number">%S</span>' +
                '</div>' ));
        });
    });
}

function restaurante_event_overlay(){

    jQuery('.list-event-box').hover(function(){
        var list_elem = jQuery(this);

        list_elem.find('.list-event-details p').show("slow");
        list_elem.find('.event-countdown').show("slow");


    },function(){

        var list_elem = jQuery(this);

        list_elem.find('.list-event-details p').hide("slow");
        list_elem.find('.event-countdown').hide("slow");

    });
}

function restaurante_custom_scrollbar(){
    jQuery('#kt-single-author-details').mCustomScrollbar({
        theme:"minimal-dark"
    });
    jQuery('.todays-menu-container').mCustomScrollbar({
        theme:"dark-thin"
    });
}
function restaurante_add_smooth_scroll_class(){
    jQuery('.smoothScroll').smoothScroll({
        speed: 1000
    });
}
jQuery(document).ready(function ($) {

    'use-strict';
    restaurante_custom_scrollbar();
    restaurante_event_overlay();
    restaurante_restaurant_responsive_menu_add();
    restaurante_get_event_countdown();
    restaurante_restaurant_remove_map_overlay();
    restaurante_restaurant_get_slider();
    restaurante_restaurant_same_height();
    restaurante_restaurant_gallery_slider();
    restaurante_restaurant_add_lightbox_to_galleries();
    restaurante_restaurant_post_sliders();
    restaurante_restaurant_post_carousel();
    restaurante_restaurant_testimonials_carousel();
    restaurante_restaurant_set_tiled_galleries();
    restaurante_restaurant_member_social_show();
    restaurante_add_smooth_scroll_class();

    jQuery('#kt-gallery').each(function () {

        jQuery(this).unitegallery({

            tiles_type: "justified",
            tiles_justified_space_between: 0,
            tile_enable_image_effect: true,
            tile_image_effect_reverse: true,
            tile_enable_textpanel: false,
            tiles_justified_row_height:300,
            tile_image_effect_type: "blur",
            tile_enable_overlay: true,			//enable tile color overlay (on mouseover)
            tile_overlay_opacity: 0.2,			//tile overlay opacity
            tile_overlay_color: "#509834",
        });
    });

});