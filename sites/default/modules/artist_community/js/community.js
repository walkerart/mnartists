(function($) {
    $(document).ready(function() {

        // infinite scrolling dealings-with
        // do href stuff
        var moreLink = $('.item-more a');

        // update more link href to use async load
        var params = moreLink.attr('href').split('?')[1].split('&');
        var endpoint = '/communitygetitems';
        var newHref = endpoint + '?' + params.join('&');

        // attach the async more items link
        moreLink.attr('href', newHref);

        // attach jscroll
        // @TODO autoTrigger doesn't seem to be working, either
        // fix or find another library
        var moreContentContainer = $('.content-all');
        moreContentContainer.jscroll({
            loadingHtml: '<img src="http://mnartist.imalab.us/sites/default/themes/mnartists/images/icon-loader.gif" alt="Loading" height="100" width="100> Loading...',
            padding: 0,
            nextSelector: '.item-more a',
            autoTrigger: false,
            debug: true,

            // jscroll places new results into their own container
            // which we don't want, so pull the results out and
            // remove it
            callback: function () {
                $('.jscroll-inner').append($('.jscroll-added').find('.item'));
                $('.jscroll-added').remove();
            }
        });

    });
})(jQuery);
