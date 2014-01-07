(function($) {
    $(document).ready(function() {

        // infinite scrolling dealings-with

        // see if we have a more link...
        var moreContentContainer = $('.content-all');
        var moreLinkContainer = moreContentContainer.find('.item-more');

        if (moreLinkContainer.length !== 0) {

            var moreLink = moreLinkContainer.find('a');

            // do href stuff
            // update more link href to use async load
            var params = moreLink.attr('href').split('?')[1].split('&');
            var endpoint = '/communitygetitems';
            var newHref = endpoint + '?' + params.join('&');

            // attach the async more items link
            moreLink.attr('href', newHref);

            // trying to roll my own, can't seem to do a good
            // cutoff once you get to the bottom
            $(window).scroll(function (evt) {

                // @TODO think about updating window.location to preserve state?
                if($(window).scrollTop() == $(document).height() - $(window).height()) {

                    $('.item-loading-indicator').remove();
                    moreContentContainer.append($('<div id="item-loading-indicator" class="item-loading-indicator">loading more content</div>'));

                    $.ajax({
                        url: newHref,
                        success: function (html) {

                            if (moreLinkContainer) {
                                moreLinkContainer.remove();
                            }

                            if (html) {

                                // kill the loading indicator (by class in case
                                // we have somehow elsewhere ended up with more than one)
                                $('.item-loading-indicator').remove();

                                // append the incoming markup, then get it parsed so
                                // we can check it for a 'more' link
                                moreContentContainer.append(html);
                                var findContent = $('<output>').append($.parseHTML(html));

                                if (findContent.find('.item-more').length !== 0) {

                                    // re-fgure-out the
                                    moreLinkContainer = moreContentContainer.find('.item-more');
                                    moreLink = moreLinkContainer.find('a');
                                    params = moreLink.attr('href').split('?')[1].split('&');
                                    endpoint = '/communitygetitems';
                                    newHref = endpoint + '?' + params.join('&');

                                    // attach the async more items link
                                    moreLink.attr('href', newHref);

                                    // remove the loading indicator
                                    $('.item-loading-indicator').remove();

                                } else {
                                    $(window).unbind('scroll');
                                    return;
                                }
                            } else {
                                return;
                            }
                        },
                        error: function (error) {
                            // put an error message in the loading indicator
                            $('#item-loading-indicator').text('error loading more content');
                        },
                    });
                }
            });
        }
    });
})(jQuery);
