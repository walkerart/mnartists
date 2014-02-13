(function ($) {
    $(function() {
        var vaa = $(".view-artist-artworks");
        if (vaa.length === 0) {
            return;
        }

        var newContainer = $("<div>", {
            "class": "artist-artworks-slider"
        }).appendTo(vaa.parents("dd"));

        var largeDisplayContainer = $("<div>", {
            "class": "large-display"
        }).appendTo(newContainer);

        var thumbsContainer = $("<div>", {
            "class": "thumbs"
        }).appendTo(newContainer);

        var maxHeight = 0;
        var rows = vaa.find(".views-row");
        for (var i = 0, numRows = rows.length; i < numRows; i++) {
            var row = $(rows[i]);
            var rowHref = row.find('.views-field-title').find('a').attr('href');
            var thumbnail = row.find("img.image-style-media-thumbnail, img.image-style-square-thumbnail");
            thumbnail.attr("data-slide",i);
            thumbnail.parents(".file").remove();
            var mainMedia = row.find(".content");
            mainMedia.find('img').wrap('<a href="' + rowHref + '"></a>');
            mainMedia.parents(".file").remove();
            var rightContent = row.find(".description").remove();
            var leftContent = row.html();
            var slide = $("<div>", {
                "class": "slide slide-" + i,
                "html": mainMedia,
                "data": {
                    "slide": i
                }
            });
            slide.append($("<div>", {
                "html": leftContent,
                "class": "left"
            })).append($("<div>", {
                "html": rightContent,
                "class": "right"
            }));

            largeDisplayContainer.append(slide);
            slideHeight = slide.outerHeight(true);
            maxHeight = slideHeight > maxHeight ? slideHeight : maxHeight;
            if (i !== 0) {
                slide.hide();
            }

            thumbsContainer.append(thumbnail);
        }

        thumbsContainer.delegate("img", "click", function(e) {
            e.preventDefault();
            var clicked = $(e.currentTarget).data("slide");
            $(".slide").hide();
            $(".slide-" + clicked).show();
        });

        vaa.remove();
    });
}(jQuery));
