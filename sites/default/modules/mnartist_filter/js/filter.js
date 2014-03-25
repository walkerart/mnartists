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
        $(".filter-rename-button").click(function (evt) {

            evt.preventDefault();

            // get the elements we'll be working with
            var parentRow = $(this).closest('tr');
            var staticState = parentRow.find('.rename-filter-static-state');
            var editingState = parentRow.find('.rename-filter-editing-state');
            var editButton = $(this);

            staticState.hide();
            editButton.hide();
            editingState.show();

        });

        $(".rename-filter-cancel-button").click(function (evt) {

            // get the elements we'll be working with
            var parentRow = $(this).closest('tr');
            var staticState = parentRow.find('.rename-filter-static-state');
            var editingState = parentRow.find('.rename-filter-editing-state');
            var editButton = parentRow.find('.filter-rename-button');
            var editingForm = parentRow.find('form')[0];

            editingForm.reset();
            editingState.hide();
            staticState.show();
            editButton.show();

        });


    });
})(jQuery);