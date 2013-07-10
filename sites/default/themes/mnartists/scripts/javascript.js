/* DOCUMENT READY STUFF */
jQuery(document).ready(function(){
	jQuery.each(jQuery(".field-name-field-media"), function() {
		var ele = jQuery(this).find(".field-items");
		var ch = ele.children(".field-item");
		var n=0;
		jQuery.each(ch, function(){
			if(this.innerHTML != "")
				n += 1;
		})
	    if (n > 1) {
	    	ele.slidesjs({
		    	width: 940,
	        	height: 528
		    });
	    }
	});
	jQuery.each(jQuery(".view.view-artist-artworks.view-id-artist_artworks"), function() {
		var ele = jQuery(this).find(".view-content");
		var ch = ele.children(".views-row");
		var n=0;
		jQuery.each(ch, function(){
			if(this.innerHTML != "")
				n += 1;
		})
	    if (n > 1) ele.slidesjs();
	});
    jQuery(".field-item").fitVids();
});
