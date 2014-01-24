(function($) {
    $(document).ready(function() {

        var contentContainer = $('.content-all');

        // infinite scrolling dealings-with
        $('.content-all').infinify({
            more_link_container_selector: '.item-more',
            loading_indicator_selector: '.item-loading-indicator',
            endpoint_stem: '/communitygetitems',
            append_callback: function (newContent) {
                contentContainer.isotope('appended', newContent);
                contentContainer.imagesLoaded(function () {
                    contentContainer.isotope('reloadItems');
                });
            }
        });

        contentContainer.imagesLoaded(function() {
            contentContainer.isotope();
        });

    });
})(jQuery);