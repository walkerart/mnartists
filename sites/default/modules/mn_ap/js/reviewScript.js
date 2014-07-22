(function($){
$(document).ready(function(){

	$("#input-star").rating();

	$('.ap-more').click(function() {
        $(this).prev('.ap-artwork-body').css({'height': 'auto'});
        $(this).addClass('hidden');
    });

    $('.ap-artwork-body').click(function() {
        $(this).css({'height': '96px'});
        $(this).next('.ap-more').removeClass('hidden');
    });

    $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
		event.preventDefault();
		return $(this).ekkoLightbox();
	});

    $('img').VimeoThumb();
});
})(jQuery);