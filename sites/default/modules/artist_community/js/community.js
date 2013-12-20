(function($) {
    $(document).ready(function() {

        // infinite scrolling dealings-with
        // do href stuff
        var moreContentContainer = $('.content-all');
        var moreLinkContainer = moreContentContainer.find('.item-more');
        var moreLink = moreLinkContainer.find('a');

        // update more link href to use async load
        var params = moreLink.attr('href').split('?')[1].split('&');
        var endpoint = '/communitygetitems';
        var newHref = endpoint + '?' + params.join('&');

        // attach the async more items link
        moreLink.attr('href', newHref);




        // trying to roll my own, can't seem to do a good
        // cutoff once you get to the bottom
        $(window).scroll(function (evt) {

            // @TODO add a loading indicator, think about updating window.location
            if($(window).scrollTop() == $(document).height() - $(window).height()) {
                $.ajax({
                    url: newHref,
                    success: function(html)
                    {
                        moreLinkContainer.remove();
                        if (html) {

                            var findContent = $('<output>').append($.parseHTML(html));
                            moreContentContainer.append(html);

                            if (findContent.find('.item-more').length !== 0) {

                                moreLinkContainer = moreContentContainer.find('.item-more');
                                moreLink = moreLinkContainer.find('a');
                                params = moreLink.attr('href').split('?')[1].split('&');
                                endpoint = '/communitygetitems';
                                newHref = endpoint + '?' + params.join('&');

                                // attach the async more items link
                                moreLink.attr('href', newHref);
                            } else {
                                $(window).unbind('scroll');
                                return;
                            }
                        } else {
                            return;
                        }
                    }
                });
            }
        });
    });
})(jQuery);
