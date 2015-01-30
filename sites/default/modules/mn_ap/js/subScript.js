(function($){
$(document).ready(function(){

	$('#subTable').dataTable( {
		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
		"columns": [
      { "type": "numeric" },
      { "type": "html" },
      { "type": "html" },
      { "type": "numeric" },
      { "type": null, "searchable": false }
    ]
	});

	$('#juryTable').dataTable( {
		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
		"columns": [
      { "type": "html-num" },
      { "type": "html" },
      { "type": "html" },
      { "type": "numeric" },
      { "type": null, "searchable": false }
    ]
	});

	$('.dataTables_filter input').attr("placeholder", " Search");
	$('.dataTables_filter input').addClass("search-container");

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
