(function($) {
    $(document).ready(function() {
        $('.user-feed').infinify({
            more_link_container_selector: '.feed-item-more',
            more_link_selector: 'a',
            loading_indicator_selector: '.item-loading-indicator',
            endpoint_stem: '/user/feed/more'
        });
    });
})(jQuery);
