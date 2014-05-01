(function($) {
    $(document).ready(function() {

        // console.log($('#welcome-form input[type=checkbox]'));
        $('#welcome-form input[type=checkbox]').change(function() {
            console.log('checkbox state changed');
            $('#welcome-form').trigger('submit');
        });
        $('#welcome-form').submit(function(evt) {
            evt.preventDefault();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (data) {
                    // don't need to do anything
                }
            });
        });
    });
})(jQuery);
