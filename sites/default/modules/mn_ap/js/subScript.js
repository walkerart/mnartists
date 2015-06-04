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
      { "targets": "avg-rating", "type": "enum" },
      { "targets": "admin", "orderable": false },
      { "targets": "status", "type": "string" },
      { "targets": "unsubmit", "type": "string" }
    ]
	});

	$.extend( jQuery.fn.dataTableExt.oSort, {
    "enum-pre": function ( a ) {
        // Add / alter the switch statement below to match your enum list
        switch( a ) {
            case "None":   return 0;
            	case "0/10":   return 1;
	case "0.5/10":   return 2;
	case "1/10":   return 3;
	case "1.5/10":   return 4;
	case "2/10":   return 5;
	case "2.5/10":   return 6;
	case "3/10":   return 7;
	case "3.5/10":   return 8;
	case "4/10":   return 9;
	case "4.5/10":   return 10;
	case "5/10":   return 11;
	case "5.5/10":   return 12;
	case "6/10":   return 13;
	case "6.5/10":   return 14;
	case "7/10":   return 15;
	case "7.5/10":   return 16;
	case "8/10":   return 17;
	case "8.5/10":   return 18;
	case "9/10":   return 19;
	case "9.5/10":   return 20;
	case "10/10":   return 21;
	    default:       return 1;
        }
    },
 
    "enum-asc": function ( a, b ) {
        return ((a < b) ? -1 : ((a > b) ? 1 : 0));
    },
 
    "enum-desc": function ( a, b ) {
        return ((a < b) ? 1 : ((a > b) ? -1 : 0));
    }
	} );

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
