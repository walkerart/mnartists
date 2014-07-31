(function($){
$(document).ready(function(){
    //hide redundant information from resume
    $(".general-statement").hide();
    $(".biography").hide();

    // Fetch the elements
    var //$result = $('#result'),
        $menu = $('#ap-menu'),
        $content = $('#ap-content'),
        $step1 = $('#step1'),
        $step2 = $('#step2'),
        $step3 = $('#step3'),
        $step4 = $('#step4'),
        $step5 = $('#step5'),
        $step6 = $('#step6'),
        $current = $('#current');

    // Get the tabs
    var $tabs = $content.children();

    // Hide all our tabs initially
    $tabs.hide();

    //handler for prevent defualts for disabled links
    var handler = function(event) {
        event.preventDefault();
    };

    $('a[disabled=disabled]').bind('click', handler); //apply the handler

    //start - show the first step
    $step1.stop(true,true).fadeIn(200);
    $.History.go('/#/step1');

    // Fetch our original document title
    var document_title = document.title;

    // Define our update menu function - as this is used a lot
    var updateMenu = function(state){
        // stateId = state.substr(5, 1);
        // console.log(stateId);
        $menu.children('li:has(a[href="#'+state+'"])').addClass('active').siblings('.active').removeClass('active').removeClass('disabled');
        //$menu.children('li:has(a[href="#'+state+'"])').find("a").removeAttr('disabled').addClass('enabled');
        // $('a[class=enabled]').unbind('click', handler);
        // $menu.children().addClass('active').siblings('.active').removeClass('active').removeClass('disabled');
        // $menu.children().find("a").removeAttr('disabled').addClass('enabled');
        // $('a[class=enabled]').unbind('click', handler);
    };

    //function used in Ajax to checkif field exists
    jQuery.fn.exists = function(){return this.length>0;};

    function updateAjax() {
        locpath = window.location.pathname;
        if (locpath.slice(-1) != '/') locpath = locpath + '/';
        href = locpath + "ajax";
        nid = $('#nid').val();
        first_name = $('#first_name').val();
        last_name = $('#last_name').val();
        email = $('#email').val();
        phone = $('#phone').val();
        address = $('#address').val();
        city = $('#city').val();
        state = $('#state').val();
        zip = $('#zip').val();
        website = $('#website').val();
        gender = $('#gender').exists() ? $('#gender').val() : '';
        ethnicity = $('#ethnicity').exists() ? $('#ethnicity').val() : '';
        age = $('#age').exists() ? $('#age').val() : '';
        county = $('#county').exists() ? $('#county').val() : '';
        country = $('#country').exists() ? $('#country').val() : '';
        statement = $('#statementEditor').exists() ? CKEDITOR.instances['statementEditor'].getData() : '';
        bio = $('#bioEditor').exists() ? CKEDITOR.instances['bioEditor'].getData() : '';
        proposal = $('#proposalEditor').exists() ? CKEDITOR.instances['proposalEditor'].getData() : '';
        field1 = $('#field1Editor').exists() ? CKEDITOR.instances['field1Editor'].getData() : '';
        field2 = $('#field2Editor').exists() ? CKEDITOR.instances['field2Editor'].getData() : '';
        field3 = $('#field3Editor').exists() ? CKEDITOR.instances['field3Editor'].getData() : '';
        field4 = $('#field4Editor').exists() ? CKEDITOR.instances['field4Editor'].getData() : '';

        $.ajax({
            type: 'POST',
            url: href,
            data: {
                node_id: nid,
                first_name: first_name,
                last_name: last_name,
                email: email,
                phone: phone,
                address: address,
                city: city,
                state: state,
                zip: zip,
                website: website,
                gender: gender,
                ethnicity: ethnicity,
                age: age,
                county: county,
                country: country,
                bio: bio,
                statement: statement,
                proposal: proposal,
                field1: field1,
                field2: field2,
                field3: field3,
                field4: field4
            },
            dataType: 'json',
            async: true
        })
        .success(function() {
            $(window).off('beforeunload');
        });
    }

    // Bind a handler for ALL hash/state changes
    $.History.bind(function(state){
        // Update the current element to indicate which state we are now on
        //$current.text('Our current state is: ['+state+']');
        // Update the page's title with our current state on the end
        document.title = document_title + ' | ' + state;
    });

    $('#ApplicationForm').validate();

    $('div#gotoStep1, li#gotoStep1').on('click', function () {
            // code to reveal step 2
            $step1.stop(true,true).fadeIn(200);
            $.History.go('#/step1');
    });

    // Bind a handler for state: step1
    $.History.bind('/step1',function(state){
        // Update Menu
        updateMenu(state);
        // Show apricots tab, hide the other tabs
        $tabs.hide();
        $step1.stop(true,true).fadeIn(200);
        //updateAjax();
        updateConfirmationView();
    });

    $('div#gotoStep2, li#gotoStep2').on('click', function () {
        if ($('#ApplicationForm').valid()) {
            // code to reveal step 2
            $step2.stop(true,true).fadeIn(200);
            $.History.go('#/step2');
        }
    });

    // Bind a handler for state: step2
    $.History.bind('/step2',function(state){
        // Update Menu
        updateMenu(state);
        // Show step2 tab, hide the other tabs
        $tabs.hide();
        $step2.stop(true,true).fadeIn(200);
        updateAjax();
        updateConfirmationView();
    });

    $('div#gotoStep3, li#gotoStep3').on('click', function () {
        stepIndex = 0;
        checkStepValidation(stepIndex);
    });

    // Bind a handler for state: step3
    $.History.bind('/step3',function(state){
        // Update Menu
        updateMenu(state);
        // Show step3 tab, hide the other tabs
        $tabs.hide();
        $step3.stop(true,true).fadeIn(200);
        updateAjax();
        updateConfirmationView();
    });

    $('div#gotoStep4, li#gotoStep4').on('click', function () {
        stepIndex = 1;
        checkStepValidation(stepIndex);
    });

    // Bind a handler for state: step4
    $.History.bind('/step4',function(state){
        // Update Menu
        updateMenu(state);
        // Show step4 tab, hide the other tabs
        $tabs.hide();
        $step4.stop(true,true).fadeIn(200);
        updateAjax();
        updateConfirmationView();
    });

    $('div#gotoStep5, li#gotoStep5').on('click', function () {
        stepIndex = 2;
        checkStepValidation(stepIndex);
    });
        // Bind a handler for state: step5
    $.History.bind('/step5',function(state){
        // Update Menu
        updateMenu(state);
        // Show step5 tab, hide the other tabs
        $tabs.hide();
        $step5.stop(true,true).fadeIn(200);
        updateAjax();
        updateConfirmationView();
    });

    $('div#gotoStep6, li#gotoStep6').on('click', function () {
        stepIndex = 3;
        checkStepValidation(stepIndex);
    });

    // Bind a handler for state: step6
    $.History.bind('/step6',function(state){
        // Update Menu
        updateMenu(state);
        // Show step6 tab, hide the other tabs
        $tabs.hide();
        $step6.stop(true,true).fadeIn(200);
        updateAjax();
        updateConfirmationView();
    });

    //$('input[class=ap-check]').iCheck();

    $('.ap-more').click(function() {
        $(this).prev('.ap-artwork-body').css({'height': 'auto'});
        $(this).addClass('hidden');
    });

    $('.ap-artwork-body').click(function() {
        $(this).css({'height': '96px'});
        $(this).next('.ap-more').removeClass('hidden');
    });

    var uploadFieldsChanged = [];
    var uploadFiles = [];
    var u = 0;
    $('input.custom-upload').change(function (){
        var uploadId = this.id;
        uploadFieldsChanged[u] = uploadId;
        u++;
        if (window.File && window.FileReader) {
            var fileInput = document.getElementById(uploadId);
            var fileDisplayArea = document.getElementById(uploadId + 'Display');
            var fileConfirmArea = document.getElementById(uploadId + 'View');
            var file = fileInput.files[0];
            uploadFiles[u] = file;
            var imageType = /image.*/;
            if (file.type.match(imageType)) {
                display_image(file, fileDisplayArea);
                display_image(file, fileConfirmArea);
            }
        }
     });

    function display_image(file, displayArea) {
        var reader = new FileReader();
        reader.onload = function(e) {
            displayArea.innerHTML = "";
            var img = new Image();
            img.src = reader.result;
            displayArea.appendChild(img);
        };
        reader.readAsDataURL(file);
    }

    var errorMessage = '<label class="error">Required.</label>';

    function checkStepValidation(stepIndex) {
        if (Drupal.settings.steps[stepIndex] == 'statement-proposal') {
            if  (jQuery.inArray('proposal', Drupal.settings.required) !== -1 && jQuery.inArray('statement', Drupal.settings.required) !== -1) {
                prop = CKEDITOR.instances['proposalEditor'].getData();
                state = CKEDITOR.instances['statementEditor'].getData();
                if (prop && state) {
                    $.History.go('#/step' + (stepIndex + 3));
                    $( "label.error" ).remove();
                } else if (!prop && !state) {
                    $(errorMessage).insertBefore("textarea#proposalEditor");
                    $(errorMessage).insertBefore("textarea#statementEditor");
                    $('html, body').animate({ scrollTop: 0 }, 0);
                } else if (! prop) {
                    $( "label.error" ).remove();
                    $(errorMessage).insertBefore("textarea#proposalEditor");
                    $('html, body').animate({ scrollTop: 0 }, 0);
                } else if (! state) {
                    $( "label.error" ).remove();
                    $(errorMessage).insertBefore("textarea#statementEditor");
                    $('html, body').animate({ scrollTop: 0 }, 0);
                }
            }
            else if (jQuery.inArray('proposal', Drupal.settings.required) !== -1) {
                prop = CKEDITOR.instances['proposalEditor'].getData();
                if (prop) {
                    $.History.go('#/step' + (stepIndex + 3));
                    $( "label.error" ).remove();
                } else {
                    $(errorMessage).insertBefore("textarea#proposalEditor");
                    $('html, body').animate({ scrollTop: 0 }, 0);
                }
            }
            else if (jQuery.inArray('statement', Drupal.settings.required) !== -1) {
                state = CKEDITOR.instances['statementEditor'].getData();
                if (state) {
                    $.History.go('#/step' + (stepIndex + 3));
                    $( "label.error" ).remove();
                } else {
                    $(errorMessage).insertBefore("textarea#statementEditor");
                    $('html, body').animate({ scrollTop: 0 }, 0);
                }
            }
            else if (jQuery.inArray('proposal', Drupal.settings.required) == -1 && jQuery.inArray('statement', Drupal.settings.required) == -1) {
                $.History.go('#/step' + (stepIndex + 3));
                $( "label.error" ).remove();
            }
        }
        else if (Drupal.settings.steps[stepIndex] == 'bio-resume') {
            if (jQuery.inArray('bio', Drupal.settings.required) !== -1 && jQuery.inArray('resume', Drupal.settings.required) !== -1){
                bio = CKEDITOR.instances['bioEditor'].getData();
                resume = $( "#resumeContent" ).html();
                resume = $.trim(resume);
                if (bio && resume != 'No resume data for that user.') {
                    $.History.go('#/step' + (stepIndex + 3));
                    $( "label.error" ).remove();
                } else if (!bio && resume == 'No resume data for that user.') {
                    $(errorMessage).insertBefore("textarea#bioEditor");
                    $(errorMessage).insertBefore("#resumeContent");
                    $('html, body').animate({ scrollTop: 0 }, 0);
                } else if (! bio) {
                    $( "label.error" ).remove();
                    $(errorMessage).insertBefore("textarea#bioEditor");
                    $('html, body').animate({ scrollTop: 0 }, 0);
                } else if (resume == 'No resume data for that user.') {
                    $( "label.error" ).remove();
                    $(errorMessage).insertBefore("#resumeContent");
                    $('html, body').animate({ scrollTop: 0 }, 0);
                }
            }
            else if  (jQuery.inArray('bio', Drupal.settings.required) !== -1) {
                bio = CKEDITOR.instances['bioEditor'].getData();
                if (bio) {
                    $.History.go('#/step'  + (stepIndex + 3));
                    $( "label.error" ).remove();
                } else {
                    $(errorMessage).insertBefore("textarea#bioEditor");
                    $('html, body').animate({ scrollTop: 0 }, 0);
                }
            }
            else if  (jQuery.inArray('resume', Drupal.settings.required) !== -1) {
                resume = $( "#resumeContent" ).html().trim();
                if (resume != 'No resume data for that user.') {
                    $.History.go('#/step'  + (stepIndex + 3));
                    $( "label.error" ).remove();
                } else {
                    $(errorMessage).insertBefore("#resumeContent");
                    $('html, body').animate({ scrollTop: 0 }, 0);
                }
            }
            else if (jQuery.inArray('bio', Drupal.settings.required) == -1 && jQuery.inArray('resume', Drupal.settings.required) == -1) {
                $.History.go('#/step' + (stepIndex + 3));
                $( "label.error" ).remove();
            }
        } else if (Drupal.settings.steps[stepIndex] == 'work') {
            works = $("input[class=ap-check]:checked").length;
            maxAllowed = Drupal.settings.works.max;
            minAllowed = Drupal.settings.works.min;
            if (works <= maxAllowed && works >= minAllowed){
                $.History.go('#/step'  + (stepIndex + 3));
                $( "label.error" ).remove();
                $("p#artHelp").show();
            } else {
                worksError = '<label id="artHelp" class="error">Choose at least ' + minAllowed + ' and no more than ' + maxAllowed + ' pieces of documentation to represent your work.</label>';
                $(worksError).addClass('error');
                $(worksError).insertBefore("p#artHelp");
                $("p#artHelp").hide();
                $('html, body').animate({ scrollTop: 0 }, 0);
            }
        } else if (Drupal.settings.steps[stepIndex] == 'fields-uploads') {
            var customFields = $('textarea.custom-field');
            var i = 0;
            var customFieldErrors = [];
            $.each(customFields, function() {
                var fieldName = this.name;
                var fieldNameReq = fieldName.substr(0, 6);
                if  (jQuery.inArray(fieldNameReq, Drupal.settings.required) !== -1) {
                    var fieldContents = CKEDITOR.instances[fieldName].getData();
                    if (!fieldContents) {
                        customFieldErrors[i] = this;
                        i++;
                    }
                }
            });
            var uploadFields = $('input.custom-upload');
            $.each(uploadFields, function() {
                if (jQuery.inArray(this.id, Drupal.settings.required) !== -1) {
                    if(jQuery.inArray(this.id, uploadFieldsChanged) == -1) {
                        customFieldErrors[i] = this;
                        i++;
                    }
                }
            });
            if (customFieldErrors.length >= 1) {
                $( "label.error" ).remove();
                $.each(customFieldErrors, function() {
                    $(errorMessage).insertBefore(this);
                    $('html, body').animate({ scrollTop: 0 }, 0);
                });
            } else {
                $.History.go('#/step'  + (stepIndex + 3));
                $( "label.error" ).remove();
            }
        }
    }

    $('input[class="ap-check"]').change(function () {
        var maxAllowed = Drupal.settings.works.max;
        var minAllowed = Drupal.settings.works.min;
        var cnt = $("input[class='ap-check']:checked").length;
        if (cnt > maxAllowed)
        {
            $(this).prop("checked", "");
            alert("You have selected maximum number of: " + maxAllowed + " artworks.");
        } else {
            var apChecked = $("input[class='ap-check']:checked");
            apChecked.checked = true;
            apChecked.prop('checked', 'checked');
            updateConfirmationView(apChecked);
        }
    });

    function updateConfirmationView(works) {
        steps = [];
        $.each(Drupal.settings.steps, function(index, value) {
            steps[value] = value;
        });

        if(works){
            $('div.ap-artrow').addClass('hidden');
            $('span.ap-artwork').addClass('hidden');
            $.each(works, function() {
                workVid = $(this).data('vid');
                workId = $(this).data('id');
                $('div#' + workVid).removeClass('hidden');
                workIdEl = $('.ap-artwork#' + workId);
                $(workIdEl).removeClass('hidden');
            });
        }

        var view = {
            first_name: $('#first_name').val(),
            last_name: $('#last_name').val(),
            email: $('#email').val(),
            phone: $('#phone').val(),
            address: $('#address').val(),
            city: $('#city').val(),
            state: $('#state').val(),
            zip: $('#zip').val(),
            gender: $('#gender').exists() ? $('#gender').val() : false,
            ethnicity: $('#ethnicity').exists() ? $('#ethnicity').val() : false,
            age: $('#age').exists() ? $('#age').val() : false,
            county: $('#county').exists() ? $('#county').val() : false,
            country: $('#country').exists() ? $('#country').val() : false,
            statement: $('#statementEditor').exists() ? CKEDITOR.instances['statementEditor'].getData() : false,
            bio: $('#bioEditor').exists() ? CKEDITOR.instances['bioEditor'].getData() : false,
            proposal: $('#proposalEditor').exists() ? CKEDITOR.instances['proposalEditor'].getData() : false,
            field1: $('#field1Editor').exists() ? CKEDITOR.instances['field1Editor'].getData() : false,
            field2: $('#field2Editor').exists() ? CKEDITOR.instances['field2Editor'].getData() : false,
            field3: $('#field3Editor').exists() ? CKEDITOR.instances['field3Editor'].getData() : false,
            field4: $('#field4Editor').exists() ? CKEDITOR.instances['field4Editor'].getData() : false,
            upload1: $('#upload1').exists() ? $('#upload1').val() : false,
            upload2: $('#upload2').exists() ? $('#upload2').val() : false,
            upload3: $('#upload3').exists() ? $('#upload3').val() : false,
            upload4: $('#upload4').exists() ? $('#upload4').val() : false,
            steps: steps,
            titles : Drupal.settings.titles
        };
        //var output = Mustache.render("{{first_name}} {{last_name}}<br>{{address}}; {{city}}, {{state}} {{zip}}<br>", view);
        var confirmTemplate = $('#confirmTpl').html();
        var confirmHtml = Mustache.to_html(confirmTemplate, view);
        //console.log(confirmHtml);
        $('#profileAjax').html(confirmHtml);
    }

    // set message if form field edited and not saved
    $("form :input").keyup(function() {
        $(window).on('beforeunload', function(){
            return 'You will lose the changes made in the form.';
        });
    });

});
})(jQuery);
