(function($) {
    $(document).ready(function() {
        $( "#dialog-form" ).dialog({
            autoOpen: false,
            height: 225,
            width: 350,
            modal: true,
            buttons: {
                "Create a Filter": function() {
                    $('#filter-form').submit();
                },
                Cancel: function() {
                    $(this).dialog( "close" );
                }
            },
            close: function() {

            }
        });

        $( "#create-new-filter" )
            .click(function() {
                $( "#dialog-form" ).dialog( "open" );
            });


        // basic event handlers for in-place filter title
        // editing buttons
        $(".rename-filter-rename-link").click(function (evt) {
            // get the elements we'll be working with
            var staticState = $(this).closest('.rename-filter-static-state');
            var editingState = $($(this).parent().siblings('.rename-filter-editing-state'));

            staticState.hide();
            editingState.show();
        });

        $(".rename-filter-cancel-button").click(function (evt) {
            // get the elements we'll be working with
            var editingState = $(this).closest('.rename-filter-editing-state');
            var staticState = $($(this).parent().parent().siblings('.rename-filter-static-state'));

            editingState.hide();
            staticState.show();
        });


    });
})(jQuery);