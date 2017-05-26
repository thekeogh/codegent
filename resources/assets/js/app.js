import $ from 'jquery';
import smoothScroll from 'jquery-smooth-scroll';
import slick from 'slick-carousel';

/**
 * Activate, basic, simple, old skool jQuery
 */
$(() => {
    
    /**
     * Products carousel
     */
    $('.CarouselProducts').slick({
        dots: false,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        arrows: true,
        autoplay: true,
        pauseOnHover: false,
        pauseOnFocus: false,
        prevArrow: '<i class="material-icons slick-prev">keyboard_arrow_left</i>',
        nextArrow: '<i class="material-icons slick-next">keyboard_arrow_right</i>',
        autoplaySpeed: 5000
    });
    
    /**
     * Toggle primary nav reveal for mobile
     */
    $('.Primary__reveal').on('click', () => {
        if ($('body').hasClass('nav--on')) {
            $('body').removeClass('nav--on');
            menu_icon('menu');
        } else {
            $('body').addClass('nav--on');
            menu_icon();
        }
    })
    function menu_icon(icon = 'close') {
        setTimeout(() => {
            $('.Primary__reveal .material-icons').text(icon);
        }, 300)
    }
    
    /**
     * Toggle secondary nav reveal for mobile
     */
    $('.Primary__more').on('click', function() {
        let $el = $(this),
            $parent = $el.parents('.Primary__item'),
            $secondary = $el.siblings('.Secondary');
        $parent.toggleClass('Primary__item--secondary');
        $secondary.is(':visible') ? $secondary.slideUp(200) : $secondary.slideDown(200);
        
    })
    
    //
    // Utils
    // 
    
    /**
     * Open an overlay
     */
    $('.Overlayer').on('click', function(e) {
        e.preventDefault();
        let $overlay = $('.Overlay');
        let $el = $(this);
        let href = $el.attr('href');
        let embed = href.indexOf('embed') >= 0 ? true : false;
        if (embed) $('.Overlay__container--iframe').attr('src', href);
        setTimeout(() => {
            $overlay.show();
        }, 500);
    });
    
    /**
     * Close an overlay
     */
    $('.Overlay__close').on('click', (e) => {
        e.preventDefault();
        $('.Overlay').hide();
        
        $('.Overlay__container--iframe').attr('src', '#');
    })
    
    /**
     * Create a smoothscoll link
     *
     * @param  {Object} e The event (likely nothing, but if it's an a lets kill it)
     * @example           <a href="#id-of-element-to-scroll-to" class="Anchor"></a>
     */
    $('.Anchor').on('click', function(e) {
        e.preventDefault();
        $.smoothScroll({
            scrollTarget: $(this).attr('href')
        });
    });
    
});