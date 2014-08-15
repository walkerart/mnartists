(function($){
$(document).ready(function(){

    $("#opList").dataTable({
    	//"sPaginationType": "full_numbers",
    	"aoColumnDefs": [
          { "bSortable": false, "aTargets": [7,8,9] }
       ]
    });
	$( "section#main-content" ).children( "div.region" ).removeAttr( "id" );
});
})(jQuery);