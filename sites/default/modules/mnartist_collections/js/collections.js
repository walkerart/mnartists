(function($) {
    $(function(){
        var collections = $(".user-list");

        collections.imagesLoaded(function() {
            collections.masonry({
                columnWidth: '.user-list li',
                itemSelector: '.user-list li'
            });
        });
    });

})(jQuery);