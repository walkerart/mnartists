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
            contentContainer.isotope({
                onLayout: function($elems, instance) {
                    // Add exponential z-index for dropdown cropping
                    $elems.each(function(e){
                        $(this).css({ zIndex: ($elems.length - e) });
                    });
                },
            });
        });

    });
})(jQuery);