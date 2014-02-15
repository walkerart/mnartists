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
                var newElems = $( newContent ).css({ opacity: 0 });
                contentContainer.imagesLoaded(function () {
                    newElems.animate({ opacity: 1 });
                    contentContainer.isotope('appended', newElems);
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


        // sort-thing dealings-with
        $('#sort-thing-opener').click(function (evt) {
            $(this).siblings('.wrap').toggleClass('open');
            $(window).trigger('scroll');
        });

        // grab the sorter, add the retracted class to start
        var theSortThing = $('.sort-thing');
        theSortThing.addClass('sort-thing-fully-retracted');

        // on plain community page, we want to hide the sorter
        // until the search results container enters the viewport,
        // so here we set up a scroll event to add/remove the
        // sort-thing-fully-retracted class based on its position
        var percentageOfContentInViewport = 5; // reveal sort-thing when search results are this far into viewport
        var sortHide_resultsContainer = $('.search-results');
        var sortHide_targetScroll = $('.search-results').offset().top - ($(window).height() * (1 - (percentageOfContentInViewport/100)));
        $(window).scroll(function (evt) {
            var scrollTop = $(window).scrollTop();
            if (scrollTop >= sortHide_targetScroll) {
                theSortThing.removeClass('sort-thing-fully-retracted');
            } else {
                // if the user has opened the sorter but then scrolled
                // back past retract point, respect their wishes
                if (theSortThing.find('.wrap.open').length === 0) {
                    theSortThing.addClass('sort-thing-fully-retracted');
                }
            }
        });

        // trigger scroll on load, so that we get
        // the initial state right
        $(window).trigger('scroll');

        // NB: this is intended to "just work" on the non-plain
        // community pages, because the search results should
        // never be able to get low enough in the viewport to
        // trigger the disappearing sorter

    });
})(jQuery);
