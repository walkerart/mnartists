(function($) {
    $(document).ready(function() {

        // ** top articles
        // setup, grab the relevant elements
        var articleThing = $('.article-thing');
        var allTopStoryLinks = articleThing.find('.the-list-of-articles-container ul li');
        var articleBlocks = articleThing.find('.article-detail');
        var startingArticle = $(articleBlocks[0]);
        var pairedLink = articleThing.find('li[data-target-article=' + startingArticle.attr('id') + ']');

        // attach click events for the list items
        allTopStoryLinks.hover(function (evt) {
            evt.preventDefault();
            var currentTarget = $(evt.currentTarget);
            var targetElId = currentTarget.attr('data-target-article');
            var articleBlocks = $('.article-thing').find('.article-detail');
            var articleListEls = $('.article-thing').find('.the-list-of-articles-container ul li');
            articleListEls.removeClass('active');
            currentTarget.addClass('active');
            articleBlocks.hide();
            $('#' + targetElId).show();
        });

        // show/make active the first item
        startingArticle.show();
        pairedLink.addClass('active');


        // ** main content area (search results)
        var contentContainer = $('.content-all');

        // infinite scrolling dealings-with
        $('.content-all').infinify({
            more_link_container_selector: '.item-more',
            loading_indicator_selector: '.item-loading-indicator',
            endpoint_stem: '/communitygetitems',
            append_callback: function (newContent) {
                var container = $('#search-results');
                if (container.length > 0) {
                    var newElems = $( newContent ).css({ opacity: 0 });
                    contentContainer.imagesLoaded(function () {
                        newElems.animate({ opacity: 1 });
                        container.append(newElems).masonry('appended', newElems).masonry();
                    });
                    var allItems = contentContainer.find('.item');
                    allItems.each(function(e){
                        $(this).css({ zIndex: (allItems.length - e) });
                    });
                    $('.sort-thing').css({ zIndex: (allItems.length + 100)});
                }
            }
        });

        contentContainer.imagesLoaded(function() {
            var container = $('#search-results');
            if (container.length > 0) {
                container.masonry({
                    columnWidth: '.item',
                    itemSelector: '.item'
                });
            }
        });

        // update columnWidth on window resize
        $(window).smartresize(function(){
            var container = $('#search-results');
            if (container.length > 0) {
                var allItems = contentContainer.find('.item');
                container.masonry({
                    columnWidth: '.item',
                    itemSelector: '.item'
                });
                $('.sort-thing').css({ zIndex: (allItems.length + 100)});
            }
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
        var sortHide_resultsContainer = $('#search-results');
        if (sortHide_resultsContainer.length > 0) {
            var sortHide_targetScroll = sortHide_resultsContainer.offset().top - ($(window).height() * (1 - (percentageOfContentInViewport/100)));
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
        }

        // trigger scroll on load, so that we get
        // the initial state right
        $(window).trigger('scroll');

        // NB: this is intended to "just work" on the non-plain
        // community pages, because the search results should
        // never be able to get low enough in the viewport to
        // trigger the disappearing sorter

        // init the follow-menu items
        $('.follow-menu').each(function () {
            var el = $(this);
            var starEl = el.find('a.flag-link-toggle');
            var verbEl = el.find('li.follow-this .flag-verb');
            var followLinkEl = verbEl.parent();

            if (starEl.hasClass('unflag-action')) {
                verbEl.text('Unfollow');
            } else if (starEl.hasClass('flag-action')) {
                verbEl.text('Follow');
            }

            followLinkEl.click(function (evt) {
                evt.preventDefault();
                var localStarEl = $(evt.target).parent().parent().parent().parent().find('.flag-wrapper a');
                localStarEl.trigger('click');
            });
        });

        // and when a follow/flag action occurs, deal with that
        $(document).bind('flagGlobalAfterLinkUpdate', function(event, data) {
            var flagEl = $(data.link);
            var verbEl = flagEl.siblings('ul').find('li.follow-this a .flag-verb');

            if (verbEl) {
                if (data.flagStatus === 'unflagged') {
                    verbEl.text('Follow');
                } else if (data.flagStatus === 'flagged') {
                    verbEl.text('Unfollow');
                }
            }
        });

    });
})(jQuery);
