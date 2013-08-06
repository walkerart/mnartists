jQuery(function() {
    jQuery( "#dialog-form" ).dialog({
        autoOpen: false,
        height: 225,
        width: 350,
        modal: true,
        buttons: {
            "Create a Filter": function() { 
                jQuery('#filter-form').submit(); 
            },
            Cancel: function() {
                jQuery(this).dialog( "close" );
            }
        },
        close: function() {
            
        }
    });

    jQuery( "#create-filter" )
        .click(function() {
            jQuery( "#dialog-form" ).dialog( "open" );
        });
});