import $ from 'jquery';

/**
 * Activate, basic, simple, old skool jQuery
 */
$(() => {
    
    /**
     * Simple, just hide alerts after xxx seconds
     */
    $('.Alert--autohide').delay(5000).fadeOut('fast');
    
});