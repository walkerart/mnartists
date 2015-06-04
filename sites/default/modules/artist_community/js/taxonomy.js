// taxonomy.js
// contains js for /tags paths specifically,
// but all taxonomy paths should get it
(function($) {
    $(document).ready(function() {

        var contentContainer = $('section.nodes');
        contentContainer.imagesLoaded(function() {

            // setup
            var nodeItems = contentContainer.find('.item-inside');

            // do a little mangling to get our elements here
            // looking the way they do on our templated page
            nodeItems.each(function () {
                var el = $(this);
                var newEl = $('<div>').addClass('item');

                el.replaceWith(newEl);
                el.appendTo(newEl);
            });
            if (contentContainer.length > 0) {
                contentContainer.masonry({
                    columnWidth: '.item',
                    itemSelector: '.item'
                });
            }
        });

        // update columnWidth on window resize
        $(window).smartresize(function () {

            var contentContainer = $('section.nodes');
            if (contentContainer.length > 0) {
                var allItems = contentContainer.find('.item');
                contentContainer.masonry({
                    columnWidth: '.item',
                    itemSelector: '.item'
                });
            }
        });


    });
})(jQuery);