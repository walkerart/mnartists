/* DOCUMENT READY STUFF */
jQuery(document).ready(function(){
	var count = jQuery(".field-items").children().length;
    if (count > 1) jQuery(".field-items").slidesjs();
});