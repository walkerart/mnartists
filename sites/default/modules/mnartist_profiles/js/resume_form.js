(function($) {
    $(document).ready(function() {
        var targetCheckboxes = $('.field-name-field-work-date-range, .field-name-field-education-date-range, .field-name-field-membership-date-range').find('input[type=checkbox]');
        targetCheckboxes.on('ifChanged', function (ev) {
            var endDateFieldsContainer = $(this).parent().parent().parent().parent().find('.field-name-field-work-end-date');
            if ($(this).is(':checked')) {
                endDateFieldsContainer.hide();
            } else {
                endDateFieldsContainer.show();
            }
        });
        targetCheckboxes.trigger('ifChanged');
    });
})(jQuery);
