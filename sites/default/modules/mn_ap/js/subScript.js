(function($){
$(document).ready(function(){

	$('#subTable').dataTable( {
		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
		"columns": [
      { "type": "html-num" },
      { "type": "html-num" },
      { "type": "html" },
      { "type": "html" },
      { "type": "html" },
      { "type": "string" },
      { "type": "string" },
      { "type": "string", "orderable": false },
      { "type": "string", "orderable": false },
      { "type": "string", "orderable": false }
    ]
	});

	$('#juryTable').dataTable( {
		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
		"columns": [
      { "type": "html-num" },
      { "type": "html-num" },
      { "type": "html" },
      { "type": "html" },
      { "type": "html-num" },
      { "type": "string", "orderable": false }
    ]
	});

	$('.dataTables_filter input').attr("placeholder", " Search");
	$('.dataTables_filter input').addClass("search-container");
	$('.dataTables_filter').find('input').appendTo('.dataTables_filter');

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
