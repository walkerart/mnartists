/* DOCUMENT READY STUFF */
jQuery(document).ready(function(){
	var count = jQuery(".field-name-field-media").find(".field-items").children().length;
    if (count > 1) jQuery(".field-name-field-media").find(".field-items").slidesjs();
});