(function($) {
    $(document).ready(function() {

        // infinite scrolling dealings-with
        $('.content-all').infinify({
            more_link_container_selector: '.item-more',
            loading_indicator_selector: '.item-loading-indicator',
            endpoint_stem: '/communitygetitems'
        });
        
    });
})(jQuery);
