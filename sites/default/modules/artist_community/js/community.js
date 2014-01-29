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


        var columns = 3;
        var gutter = 20;
        console.log(contentContainer.width() / columns);

        contentContainer.imagesLoaded(function() {
            contentContainer.isotope({
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
            });
        });

        // update columnWidth on window resize
        $(window).smartresize(function(){
            contentContainer.isotope({
                // update columnWidth to a percentage of container width
                masonry: { columnWidth: contentContainer.width() / columns, gutterWidth: gutter }
            });
        });

        $('#sort-thing-opener').click(function (evt) {
            $(this).siblings('.wrap').toggleClass('open');
        });

    });
})(jQuery);