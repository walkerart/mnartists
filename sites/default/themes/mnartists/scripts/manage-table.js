(function($){
$(document).ready(function(){

	$( "table" ).addClass( "table op-table" );
	$( "#content" ).attr( "id", "listContent" );

	$.fn.exists = function(callback) {
		var args = [].slice.call(arguments, 1);

		if (this.length) {
			callback.call(this, args);
		}

		return this;
	};

	$('div.view-manage-artworks').exists(function() {
		if( !$.trim( $('div.view-manage-artworks').html() ).length ) {
			this.append('<p class="text-center">You have not yet added any artwork. Click Add Artwork to start adding your work.</p>');
		}
	});

	$('div.view-manage-events').exists(function() {
		if( !$.trim( $('div.view-manage-events').html() ).length ) {
			this.append('<p class="text-center">You have not yet added any events. Click Add Event to start adding your events.</p>');
		}
	});

});
})(jQuery);