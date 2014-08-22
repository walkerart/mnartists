(function($){
$(document).ready(function(){

    $("#opList").dataTable({
    	"aaSorting": [[ 1, "desc" ]],
    	'aoColumns': [
			null,
			{ 'sSortDataType': 'dom-text', 'sType': 'date' }
		],
    	"oLanguage": {
			"sLengthMenu":  '<select class="dt-select">'+
				'<option value="10">Show 10 Rows</option>'+
				'<option value="25">Show 25 Rows</option>'+
				'<option value="50">Show 50 Rows</option>'+
				'<option value="100">Show 100 Rows</option>'+
				'<option value="-1">Show All Rows</option>'+
				'</select>',
			"sSearch": ""
		},
    	"aoColumnDefs": [
          { "bSortable": false, "aTargets": [7,8,9, 10] }
       ]
    });

    $('.dataTables_filter input').attr("placeholder", " Search...");

    $("select").selectBoxIt({
		downArrowIcon: "icon-down"
		// downArrowIcon: "glyphicon glyphicon-chevron-down"
	});

	$( "section#main-content" ).children( "div.region" ).removeAttr( "id" );
});
})(jQuery);