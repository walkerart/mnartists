/* DOCUMENT READY STUFF */
jQuery(document).ready(function(){
	var count = $(".field-items").children().length;
    if (count > 1) $(".field-items").slidesjs();
});