//import $ from 'jquery';
//import chosen from 'chosen-js';

/**
 * Activate, basic, simple, old skool jQuery
 */
$(() => {
    
    /**
     * Simple, just hide alerts after xxx seconds
     */
    $('.Alert--autohide').delay(5000).fadeOut('fast');
    
    /**
     * Hook on to delete froms and just prompt before they delete
     */
    $('.DeleteForm').on('submit', () => confirm('Are you really sure you want to nuke this record forever?'));
    
    /**
     * Hook up Markdown fields
     */
    $('.Markdown').each(function() {
        new SimpleMDE({ element: this });
    });
    
    /**
     * Hook up chosen fields
     */
    $('.chosen-select').chosen();
    
    /**
     * Remove images                                  [description]
     */
    $('.AdminImage__remove').on('click', function(e) {
        e.preventDefault();
        let $field = $(this).siblings('.AdminImage__removefield');
        let $parent = $(this).parents('.AdminForm__row');
        $field.val(1);
        $parent.hide();
    })
    
});