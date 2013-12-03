(function($) {
    $(document).ready(function() {
        var categoryMultiselect = $('#edit-field-medium-und');
        if (categoryMultiselect) {
            categoryMultiselect.css('width', 'auto');
            categoryMultiselect.multiselect();
        }
    });
})(jQuery);