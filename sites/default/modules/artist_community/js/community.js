(function($) {
    $(document).ready(function() {

        var contentContainer = $('.content-all');

        // infinite scrolling dealings-with
        $('.content-all').infinify({
            more_link_container_selector: '.item-more',
            loading_indicator_selector: '.item-loading-indicator',
            endpoint_stem: '/communitygetitems',
            append_callback: function (newContent) {
                contentContainer.masonry('appended', newContent);
            }
        });

        if (contentContainer.masonry !== undefined) {
            $('.content-all:not(.content-events)').masonry({});
        }

    });
})(jQuery);
