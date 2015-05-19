(function($){
$(document).ready(function(){

	$('#subTable').dataTable( {
		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
    "columnDefs": [
      { "targets": "id", "type": "html-num" },
      { "targets": "app-id", "type": "html-num" },
      { "targets": "user-id", "type": "html-num" },
      { "targets": "firstname", "type": "html" },
      { "targets": "lastname", "type": "html" },
      { "targets": "work", "type": "html" },
      { "targets": "num-rating", "type": "html" },
      { "targets": "avg-rating", "type": "html" },
      { "targets": "admin", "orderable": false },
      { "targets": "status", "type": "string" },
      { "targets": "unsubmit", "type": "string" }
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
