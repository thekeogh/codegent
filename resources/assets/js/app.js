import $ from 'jquery';
import smoothScroll from 'jquery-smooth-scroll';

/**
 * Activate, basic, simple, old skool jQuery
 */
$(() => {
    
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
     * Create a smoothscoll link
     *
     * @param  {Object} e The event (likely nothing, but if it's an a lets kill it)
     * @example           <a href="#id-of-element-to-scroll-to" class="Anchor"></a>
     */
    $('.Anchor').on('click', function (e) {
        e.preventDefault();
        $.smoothScroll({
            scrollTarget: $(this).attr('href')
        });
    });
    
})