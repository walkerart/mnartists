/* DOCUMENT READY STUFF */
jQuery(document).ready(function(){
    jQuery(".field-name-field-media, .view-artist-artworks").fitVids();
    
    var slideContainerSelectors = [
        ".field-name-field-media",
        ".view-artist-artworks"
    ];
    var slideSelectors = [
        ".field-items",
        ".view-content"
    ];
    var slideItemSelectors = [
        ".field-item",
        ".views-row"
    ];

    for (var i = 0, len = slideContainerSelectors.length; i < len; i++) {
        var slideContainerSelector = slideContainerSelectors[i];
        var slideSelector = slideSelectors[i];
        var slideItemSelector = slideItemSelectors[i];

        var slideContainer = jQuery(slideContainerSelector);
        if (slideContainer == undefined) {
            continue;
        }
        slideContainer.each(function() {
            var $this = jQuery(this);
            var slideElem = $this.find(slideSelector);
            var slideItems = slideElem.find(slideItemSelector);
            var maxHeight = 0;

            if (slideItems.length > 1) {
                slideItems.each(function(){
                    var testHeight = jQuery(this).height();
                    maxHeight = testHeight > maxHeight ? testHeight : maxHeight; 
                });
                slideElem.slidesjs({
                    width: slideContainer.width(),
                    height: maxHeight
                }); 
            }
        });
    }
/*
	jQuery.each(jQuery(".field-name-field-media"), function() {
		var ele = jQuery(this).find(".field-items");
		var ch = ele.children(".field-item");
		var n=0;
        var maxHeight = 0;
		jQuery.each(ch, function(){
			if (this.innerHTML != "") {
				n += 1;
                var testHeight = jQuery(this).height();
                maxHeight = testHeight > maxHeight ? testHeight : maxHeight;
            }
		});
	    if (n > 1) {
	    	ele.slidesjs({
                width: jQuery(".field-name-field-media").width(),
	        	height: maxHeight
		    });
	    }
	});
	jQuery(), function() {
		var ele = jQuery(this).find(".view-content");
		var ch = ele.children(".views-row");
		var n=0;
		jQuery.each(ch, function(){
			if (this.innerHTML != "")
				n += 1;
		});
	    if (n > 1) { 
            ele.slidesjs({
                width: jQuery(".view-artist-artworks").width(),
                height: 550
            });
        }
	});
*/
});
