(function($) {
    $(function(){
        var collections = $(".user-list");

        collections.imagesLoaded(function() {
            collections.isotope({
                masonry: {
                    columnWidth: collections.width() / 3,
                    gutterWidth: 2
                }
            });
        });
    });

})(jQuery);