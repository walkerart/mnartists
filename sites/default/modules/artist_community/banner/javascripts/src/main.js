(function($) {
    var taglines = [
            'is a platform to connect designers, readers & organizations',
            'is a platform to connect craftspeople, collectors & venues',
            'is a platform to connect performers, curators & opportunities',
            'provides access to and engagement with Minnesota\'s arts culture',
            'loves you',
            'can be used as a dating site',
            'loves beautiful writing',
            'wants to hear artists\' voices',
            'is a panorama of our arts community',
            'is a network of potential collaborators',
            'will connect you to your next gig'
        ],
        taglinesContainer = '',
        currentTagline = '',
        taglinesLength = taglines.length,
        taglinesIteration = 0,
        index = 0;

    var updateTaglines = function() {
        index = 0;

        taglinesContainer.fadeOut(250, function() {
            taglinesContainer.empty().show();
            setTimeout(function() {
                showTagline(taglines[taglinesIteration]);
            }, 500);
        });

        if (taglinesIteration < (taglinesLength - 1)) {
            taglinesIteration++;
        } else {
            taglinesIteration = 0;
        }
    };

    var showTagline = function(currentTagline) {
        if (index < currentTagline.length) {
            $(taglinesContainer).append(currentTagline[index++]);
            setTimeout(function() {
                showTagline(currentTagline);
            }, 20);
        }
    };

    $(document).ready(function() {

        if ($('.organization-header').length) {
            if ($('.organization-header').hasClass('has-taglines')) {
                $('.organization-header').append('<div class="taglines" />');
                taglinesContainer = $('.organization-header .taglines');
                updateTaglines();
                var taglinesInterval = setInterval(function() {
                    updateTaglines();
                }, 5000);
            }
        }

    });
})(jQuery);