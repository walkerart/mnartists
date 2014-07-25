(function($) {
    $(document).ready(function() {

        // stash this in a var so we can use it in
        // multiple places, then apply it to the
        // elements we have on page load
        var followMenuInit = function () {
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
        };
        $('.follow-menu').each(followMenuInit);

        // bind on more content, plus re-bind the flags module stuff
        // at the same time (or else none of OUR stuff works, since
        // it depends on triggering the built-in flags module stuff)
        $('#search-results').bind('infinifyContentContainerDidAddMoreContent', function () {
            $.getScript('/sites/all/modules/flag/theme/flag.js', function() {
                Drupal.behaviors.flagLink.attach(document);
            });
            $(this).find('.follow-menu').each(followMenuInit);
        });

        // and when a follow/flag action occurs, deal with that
        $(document).bind('flagGlobalAfterLinkUpdate', function(event, data) {
            var flagEl = $(data.link);
            var verbEl = flagEl.siblings('ul').find('li.follow-this a .flag-verb');
            var parentUlEl = (flagEl.parent().parent().hasClass('follow-menu')) ? flagEl.parent().parent() : flagEl.parent().parent().parent().parent();

            if (verbEl) {
                if (data.flagStatus === 'unflagged') {
                    verbEl.text('Follow');
                    parentUlEl.removeClass('collected');
                } else if (data.flagStatus === 'flagged') {
                    verbEl.text('Unfollow');
                    parentUlEl.addClass('collected');
                }
            }
        });

    });
})(jQuery);