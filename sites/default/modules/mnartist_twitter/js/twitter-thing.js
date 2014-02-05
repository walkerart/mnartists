(function($) {
    $(document).ready(function() {

        var twitterThingContainer = $('.twitter-thing');
        var hiddenTweetBlock = twitterThingContainer.find('.twitter-thing-hidden');

        // hide the extra tweets
        hiddenTweetBlock.hide();

        // and attach to more link to show the rest
        // when the more link is clicked
        $('#twitter-more-link').find('a').click(function (evt) {
            $(this).closest('.twitter-thing').addClass('expanded');
            $(this).parent().remove();
            hiddenTweetBlock.show();
        });

    });
})(jQuery);
