(function($){
$(document).ready(function(){

	var targetRadios = $('input[type="radio"]');
	targetRadios.iCheck();

	$("select").selectBoxIt({
		downArrowIcon: "icon-down"
	});

});
})(jQuery);