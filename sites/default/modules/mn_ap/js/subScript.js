(function($){
$(document).ready(function(){

	$('#subTable').dataTable( {
		"oLanguage": {
		"sLengthMenu":  '<select class="dt-select">'+
			'<option value="10">Show 10 Rows</option>'+
			'<option value="25">Show 25 Rows</option>'+
			'<option value="50">Show 50 Rows</option>'+
			'<option value="100">Show 100 Rows</option>'+
			'<option value="-1">Show All Rows</option>'+
			'</select>'
		}
	});

	$('#juryTable').dataTable( {
		"oLanguage": {
		"sLengthMenu":  '<select class="dt-select">'+
			'<option value="10">Show 10 Rows</option>'+
			'<option value="25">Show 25 Rows</option>'+
			'<option value="50">Show 50 Rows</option>'+
			'<option value="100">Show 100 Rows</option>'+
			'<option value="-1">Show All Rows</option>'+
			'</select>'
		}
	});

	$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
		event.preventDefault();
		return $(this).ekkoLightbox();
	});

	$('img').VimeoThumb();

	$("select").selectBoxIt({
		downArrowIcon: "icon-down"
		// downArrowIcon: "glyphicon glyphicon-chevron-down"
	});

});
})(jQuery);