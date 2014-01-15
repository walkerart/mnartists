// 'infinify'
// @IMALab
// sheesh, what a dumb name.
// intended to be a super-simple infinite scroll thinger,
// derived from some custom code written for the community
// and feed sections of mnartists
// @TODO document options
(function($) {
    $.fn.infinify = function (options) {

        var windowOffset = options.window_offset || 0;

        if (options.more_link_container_selector &&
            options.more_link_selector &&
            options.loading_indicator_selector &&
            options.endpoint_stem) {

            var moreContentContainer = $(this);
            moreContentContainer.attr('data-infinify-load-in-progress', 'false');
            var moreLinkContainer = moreContentContainer.find(options.more_link_container_selector);

            var loadingIndicatorClass = options.loading_indicator_selector.split('.')[1];
            debugger;

            if (moreLinkContainer.length !== 0) {

                var moreLink = moreLinkContainer.find(options.more_link_selector);

                // do href stuff
                var params = moreLink.attr('href').split('?')[1].split('&');
                var endpoint = options.endpoint_stem;
                var newHref = endpoint + '?' + params.join('&');

                $(window).scroll(function (evt) {

                    // @TODO think about updating window.location to preserve state?
                    if($(window).scrollTop() == $(document).height() - ($(window).height() - windowOffset) &&
                        moreContentContainer.attr('data-infinify-load-in-progress') === 'false') {

                        moreContentContainer.attr('data-infinify-load-in-progress', 'true');

                        var loadingIndicatorEl = $(options.loading_indicator_selector);
                        loadingIndicatorEl.remove();

                        moreContentContainer.append($('<div class="' + loadingIndicatorClass + '">loading more content</div>'));

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
                                    // console.log(loadingIndicatorEl);

                                    // append the incoming markup, then get it parsed so
                                    // we can check it for a 'more' link
                                    moreContentContainer.append(html);
                                    var findContent = $('<output>').append(html);
                                    console.log(findContent);

                                    if (findContent.find(options.more_link_container_selector).length !== 0) {

                                        // re-figure-out the href
                                        moreLinkContainer = moreContentContainer.find(options.more_link_container_selector);
                                        moreLink = moreLinkContainer.find(options.more_link_selector);
                                        params = moreLink.attr('href').split('?')[1].split('&');
                                        endpoint = options.endpoint_stem;
                                        newHref = endpoint + '?' + params.join('&');

                                        // attach the async more items link
                                        moreLink.attr('href', newHref);

                                        // remove the loading indicator
                                        loadingIndicatorEl.remove();
                                        console.log('getting here');

                                    } else {
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
            console.log("Missing options 'more_link_container_selector' and 'more_link_selector'");
            return false;
        }
    };
})(jQuery);