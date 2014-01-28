// 'infinify'
// @IMALab, @ddamico
//
// super-simple infinite scroll thinger, derived from some
// custom code written for the community and feed sections
// of mnartists
//
// options
//  more_link_container_selector - the element that returned content will be appended to
//  loading_indicator_selector - the class to look for and apply to the loading indicator
//  endpoint_stem - the url (no params) that the 'infinite' data comes from, we'll take this url and apply the params from the 'normal' more link to it to use as the url from which we fetch more data
//  window_offset - offset in pixels from the bottom of window at which we'll trigger our 'load more' event
//
//  [more_link_selector] - the selector to check for the 'more data' url that we'll enhance
//  [append_callback(newContent)] - callback to call when append is complete, content that was appended is passed as a param
(function($) {
    $.fn.infinify = function (options) {

        var windowOffset = options.window_offset || 0;
        var moreLinkSelector = options.more_link_selector || 'a';
        var terminatorClassSelector = '.infinify-terminator';
        var appendCallback = options.append_callback || null;
        var appendCallbacks = $.Callbacks();
        if (appendCallback !== null) { appendCallbacks.add(appendCallback); }

        if (options.more_link_container_selector &&
            moreLinkSelector &&
            options.loading_indicator_selector &&
            options.endpoint_stem) {

            var moreContentContainer = $(this);
            moreContentContainer.attr('data-infinify-load-in-progress', 'false');
            var moreLinkContainer = moreContentContainer.find(options.more_link_container_selector);
            var loadingIndicatorClass = options.loading_indicator_selector.split('.')[1];

            if (moreLinkContainer.length !== 0) {

                var moreLink = moreLinkContainer.find(moreLinkSelector);

                // do href stuff (by which I mean take the original href,
                // and graft its params onto the user-provided endpoint url stem)
                var params = moreLink.attr('href').split('?')[1].split('&');
                var endpoint = options.endpoint_stem;
                var newHref = endpoint + '?' + params.join('&');

                $(window).scroll(function (evt) {

                    // @TODO think about doing a pushState here?
                    if($(window).scrollTop() == $(document).height() - ($(window).height() - windowOffset) &&
                        moreContentContainer.attr('data-infinify-load-in-progress') === 'false') {

                        // set 'update in progress' flag to true to avoid multiples
                        moreContentContainer.attr('data-infinify-load-in-progress', 'true');
                        var loadingIndicatorEl = $(options.loading_indicator_selector);
                        loadingIndicatorEl.remove();

                        // append the loading indicator
                        moreLinkContainer.remove();
                        $('<div/>').addClass(loadingIndicatorClass).attr('id', loadingIndicatorClass).insertAfter(moreContentContainer);

                        // get more content
                        $.ajax({
                            url: newHref,
                            success: function (html) {

                                if (moreLinkContainer) {
                                    moreLinkContainer.remove();
                                }

                                if (html) {

                                    // kill the loading indicator (by class in case
                                    // we have somehow elsewhere ended up with more than one)
                                    var loadingIndicatorEl = $(options.loading_indicator_selector);
                                    loadingIndicatorEl.remove();

                                    // append the incoming markup, then get it parsed so
                                    // we can check it for a 'more' link
                                    var newContent = $(html);
                                    moreContentContainer.append(newContent);
                                    appendCallbacks.fire(newContent);

                                    if (newContent.filter(options.more_link_container_selector).length !== 0) {

                                        // re-figure-out the href
                                        moreLinkContainer = moreContentContainer.find(options.more_link_container_selector);
                                        moreLink = moreLinkContainer.find(moreLinkSelector);
                                        params = moreLink.attr('href').split('?')[1].split('&');
                                        endpoint = options.endpoint_stem;
                                        newHref = endpoint + '?' + params.join('&');

                                        // attach the async more items link
                                        moreLink.attr('href', newHref);

                                        // remove the loading indicator
                                        loadingIndicatorEl.remove();

                                    } else {
                                        // we're at the end of the available data, clean up...
                                        // remove the terminator element we received back
                                        $(terminatorClassSelector).remove();

                                        // remove the now-orphaned more link
                                        moreContentContainer.find(options.more_link_container_selector).remove();

                                        // unbind this event
                                        $(window).unbind('scroll');
                                        return;
                                    }
                                } else {
                                    return;
                                }
                                moreContentContainer.attr('data-infinify-load-in-progress', 'false');
                            },
                            error: function (error) {
                                // put an error message in the loading indicator
                                $(options.loading_indicator_selector).text('error loading more content');
                                moreContentContainer.attr('data-infinify-load-in-progress', 'false');
                            },
                        });
                    }

                });
            }

        } else {
            console.log("Missing options 'more_link_container_selector' or 'loading_indicator_selector' or 'endpoint_stem'");
            return false;
        }
    };
})(jQuery);