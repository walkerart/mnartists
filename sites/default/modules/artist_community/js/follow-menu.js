(function($) {
    $(document).ready(function() {

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