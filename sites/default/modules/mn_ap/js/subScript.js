(function($){
$(document).ready(function(){

    $('#subTable').dataTable();

    $('#juryTable').dataTable();

    $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
		event.preventDefault();
		return $(this).ekkoLightbox();
	});

	$('img').VimeoThumb();

	$('.ekko-lightbox-nav-overlay').css('display', 'show');

});
})(jQuery);