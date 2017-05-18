import $ from 'jquery';

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
    
    $('.Markdown').each(function() {
        new SimpleMDE({ element: this });
        //console.log($(this));
    });
    
    //simplemde = new SimpleMDE({ element: $("#MyID")[0] });
    
});