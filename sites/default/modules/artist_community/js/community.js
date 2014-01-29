(function($) {
    $(document).ready(function() {

        var contentContainer = $('.content-all');
        var columns = 3;
        var gutter = 20;
        var isotopeOptions = {
            // update columnWidth to a percentage of container width
            masonry: {
                columnWidth: contentContainer.width() / columns,
                gutterWidth: gutter
            },
            onLayout: function($elems, instance) {
                // Add exponential z-index for dropdown cropping
                $elems.each(function(e){
                    $(this).css({ zIndex: ($elems.length - e) });
                });
            },
        };

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
                var allItems = contentContainer.find('.item');
                allItems.each(function(e){
                    $(this).css({ zIndex: (allItems.length - e) });
                });
            }
        });

        contentContainer.imagesLoaded(function() {
            contentContainer.isotope(isotopeOptions);
        });

        // update columnWidth on window resize
        $(window).smartresize(function(){
            contentContainer.isotope(isotopeOptions);
        });

        $('#sort-thing-opener').click(function (evt) {
            $(this).siblings('.wrap').toggleClass('open');
        });

    });
})(jQuery);