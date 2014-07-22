(function($){
$(document).ready(function(){

    $('.text-summary-wrapper').addClass('hidden').hide();
    $('form').attr('role', 'form');
    $('.form-item').children('input').addClass('form-control');
    $('input.date-clear').parent().addClass('col-md-4').removeClass('form-item');
    //add grid layout elements to application location checkboxes
    $("input[type='radio'].form-control").parent().addClass("op_type radio");
    $('.op_type').children('input').addClass('apLocation');
    $('#edit-op-application-type-und').addClass('col-md-8');
    $('.form-item-op-application-type-und').children('label').addClass('control-label col-md-4');
    $('#edit-field-op-uri-und-0').children('legend').addClass('hidden');
    $('#edit-field-op-uri-und-0').children('legend').hide();
    //remove unused date containers
    $('.field-type-datetime').remove();
    $('.field-type-datetime-form').remove();
    $('.field-announce-date-add-more-wrapper').remove();
    //remove description text
    $('.description').remove();
    //hide form elements for non MNArtists Opportunities
    $('#mn_ap').hide();
    $('input[name="op_application_type[und]"]').on('ifChecked', function(event){
        if (this.value == 1) {
            $("#mn_ap").removeClass("hidden");
            $("#mn_ap").show();
        } else {
            $("#mn_ap").addClass("hidden");
            $("#mn_ap").hide();
        }
    });

    //init iCheckboxes
    //$('input[name=op_application_type').iCheck();
    $('input[name=proposal]').iCheck();
    $('input[name=statement]').iCheck();
    $('input[name=bio]').iCheck();
    $('input[name=resume]').iCheck();
    $('input[name=website]').iCheck();
    $('input[name=gender]').iCheck();
    $('input[name=ethnicity]').iCheck();
    $('input[name=age]').iCheck();
    $('input[name=county]').iCheck();
    $('input[name=country]').iCheck();
    $('input[name=field1]').iCheck();
    $('input[name=field2]').iCheck();
    $('input[name=field3]').iCheck();
    $('input[name=field4]').iCheck();
    $('input[name=upload1]').iCheck();
    $('input[name=upload2]').iCheck();
    $('input[name=upload3]').iCheck();
    $('input[name=upload4]').iCheck();

    //onload for edit view need to map checkboxes back
    //and show related descriptions and form areas
    if ($('#edit-op-application-type-und-1').is(':checked')) {
            $("#mn_ap").removeClass("hidden");
            $("#mn_ap").show();
    }
    var checkboxElements = $('.form-item-field-op-required-und input, .form-item-field-op-optional-und input');
    $.each(checkboxElements, function() {
        if ($(this).is(':checked')) {
            //split id an build id used for radios
            var thisId = this.id.split('-');
            var radioId = 'input#' + thisId[5] + thisId[3].charAt(0).toUpperCase().slice(0, 3) + thisId[3].slice(1, 3);
            //set radio to checked and show hidden textarea for desc
            $(radioId).prop('checked', 'checked');
            $(radioId).checked = true;
            $(radioId).iCheck({
                activeClass: 'active',
            });
            $('input#' + thisId[5] + 'Non').iCheck({
                activeClass: 'active',
            });
            $('tr#' + thisId[5]).show('slow').removeClass('hidden');
        }
    });

    $('td input[type=radio]').on('ifChecked', function(event){
    var hiddenRow = "tr#" + this.name;
        //console.log((this.id).slice(-3));
        var inName = this.name;
        if ((this.id).slice(-3) == "Non") {
            $(hiddenRow).hide();
            //console.log('Non' + inName);
            $('input#edit-field-op-required-und-' + inName).prop('checked', '');
            //$('input#edit-field-op-required-und-' + inName).removeAttribute('checked');
            $('input#edit-field-op-required-und-' + inName).checked = false;
            $('input#edit-field-op-optional-und-' + inName).prop('checked', '');
            //$('input#edit-field-op-optional-und-' + inName).removeAttribute('checked');
            $('input#edit-field-op-optional-und-' + inName).checked = false;
            //$(hiddenRow).addClass("hidden");
        } else {
            $(hiddenRow).removeClass('hidden');
            $(hiddenRow).show('slow');
            if ((this.id).slice(-3) == "Req") {
                //console.log('input#edit-field-op-required-und-' + inName);
                $('input#edit-field-op-required-und-' + inName).prop('checked', 'checked');
                $('input#edit-field-op-required-und-' + inName).checked = true;
                $('input#edit-field-op-optional-und-' + inName).prop('checked', '');
                //$('input#edit-field-op-optional-und-' + inName).removeAttribute('checked');
                $('input#edit-field-op-optional-und-' + inName).checked = false;
            } else {
                //console.log('Opt' + inName);
                $('input#edit-field-op-required-und-' + inName).prop('checked', '');
                //$('input#edit-field-op-required-und-' + inName).removeAttribute('checked');
                $('input#edit-field-op-required-und-' + inName).checked = false;
                $('input#edit-field-op-optional-und-' + inName).prop('checked', 'checked');
                $('input#edit-field-op-optional-und-' + inName).checked = true;
            }
        }
    });
    //colapse the add custom fields areas
    $('.collapse').collapse();
    //add classes to clean up textarea display
    $('.textarea').children('div').removeClass('form-item').addClass('rowTextarea');
    $('td>div.form-group').children('div').removeClass('form-item').addClass('tdLabel');
    $('.tdLabel').children('label').prop('class', 'col-md-12');
    $('.tdLabel').children('div.form-textarea-wrapper').addClass('col-md-12');
    $('.rowTextarea').children('label').prop('class', 'col-md-4');
    $('.rowTextarea').children('div.form-textarea-wrapper').addClass('col-md-8');


});
})(jQuery);