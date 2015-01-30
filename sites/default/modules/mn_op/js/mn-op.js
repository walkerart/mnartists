(function($){
$(document).ready(function(){

	$("#opList").dataTable({
		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
		"columns": [
      { "type": "html-num" },
      { "type": "date" },
      { "type": "string" },
      { "type": "html" },
      { "type": "html" },
      { "type": "string", "orderable": false },
      { "type": "string", "orderable": false },
      { "type": "string", "orderable": false },
      { "type": "string", "orderable": false }
    ],
    "order": [ 1, 'desc' ]
	});

	$('.dataTables_filter input').attr("placeholder", " Search");
	$('.dataTables_filter input').addClass("search-container");
	$('.dataTables_filter').find('input').appendTo('.dataTables_filter');

	$("select").selectBoxIt({
		downArrowIcon: "icon-down"
		// downArrowIcon: "glyphicon glyphicon-chevron-down"
	});

	$( "section#main-content" ).children( "div.region" ).removeAttr( "id" );
});
})(jQuery);
