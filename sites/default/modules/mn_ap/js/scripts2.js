(function($){
$(document).ready(function(){

    $('select.form-select').chosen();

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
        $menu.children('li:has(a[href="#'+state+'"])').addClass('active').siblings('.active').removeClass('active').removeClass('disabled');
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
        // Need to check file extension of files uploaded
        if (checkallfileuploads() && !sizeerror) {
            // All OK, move on to next step
            stepIndex = 1;
            checkStepValidation(stepIndex);
        }
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
        // Need to check file extension of files uploaded
        if (checkallfileuploads() && !sizeerror) {
            // All OK, move on to next step
            stepIndex = 2;
            checkStepValidation(stepIndex);
        }
    });
    
    function checkallfileuploads() {
        var passed = true;
        var thisval1 = $(".NFI-wrapper.custom-upload input#upload1.valid").val();
        if (!checkuploadfile(thisval1)) {
            // Failure, display error message and stop user
            // moving on to next step
            $("#upload1_error").show();
            passed = false;
        }
        var thisval2 = $(".NFI-wrapper.custom-upload input#upload2.valid").val();
        if (!checkuploadfile(thisval2)) {
            // Failure, display error message and stop user
            // moving on to next step
            $("#upload2_error").show();
            passed = false;
        }
        var thisval3 = $(".NFI-wrapper.custom-upload input#upload3.valid").val();
        if (!checkuploadfile(thisval3)) {
            // Failure, display error message and stop user
            // moving on to next step
            $("#upload3_error").show();
            passed = false;
        }
        var thisval4 = $(".NFI-wrapper.custom-upload input#upload4.valid").val();
        if (!checkuploadfile(thisval4)) {
            // Failure, display error message and stop user
            // moving on to next step
            $("#upload4_error").show();
            passed = false;
        }
        return passed;
    }
    
    function checkuploadfile(val) {
        if (typeof val !== 'undefined') {
            if (val.length > 0) {
                var res = val.split(".");
                var thisext = res[1].toLowerCase();
                console.log("ext is " + thisext);
                var error = true;
                if ($.inArray(thisext, ['jpg','jpeg','gif','png','txt','doc','docx','xls','xlsx','pdf','ppt','pptx','pps','ppsx','odt','ods','odp','mp3','mov','mp4','m4a','m4v','mpeg','avi','ogg','oga','ogv','weba','webp','webm']) >= 0) {
                    return true;
                } else {
                    // Failure, display error message and stop user
                    // moving on to next step
                    $("#upload1_error").show();
                    return false;
                }
            }
        }
        return true;
    }
    
    
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
        // Need to check file extension of files uploaded
        if (checkallfileuploads()) {
            // All OK, move on to next step
            stepIndex = 3;
            checkStepValidation(stepIndex);
        }
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
    var sizelimit = 2048000; //2MB
    var sizeerror = false;
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
	    if ((file.size +0) > sizelimit) {
                $("#" + uploadId + "_size_error").show();
                sizeerror = true;
            } else {
                $("#" + uploadId + "_size_error").hide();
                sizeerror = false;
                var imageType = /image.*/;
                if (file.type.match(imageType)) {
                    display_image(file, fileDisplayArea);
                    display_image(file, fileConfirmArea);
                }
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
    var wordCountRegex = /\s+/gi;


    function checkStepValidation(stepIndex) {
        if (Drupal.settings.steps[stepIndex] == 'statement-proposal') {
            stateLength = Drupal.settings.statement_length;
            if  (jQuery.inArray('proposal', Drupal.settings.required) !== -1 && jQuery.inArray('statement', Drupal.settings.required) !== -1) {
                $( "label.error" ).remove();
                prop = CKEDITOR.instances['proposalEditor'].getData();
                state = CKEDITOR.instances['statementEditor'].getData();

                if (prop && state) {
                    if(stateLength != '') {
                        state = state.trim().replace(/(<p>|<\/p>)/g, '');
                        state = state.trim().replace(/&nbsp;/g, '');
                        state = state.trim().replace(wordCountRegex, ' ');
                        wordCount = state.split(' ').length;
                        if(wordCount > stateLength) {
                            $('<label class="error">Your Statement Word Count: ' + wordCount + '. Maximum Word Count: ' + stateLength + '</label>').insertBefore("textarea#statementEditor");
                            $('html, body').animate({ scrollTop: 0 }, 0);
                        } else {
                            $.History.go('#/step' + (stepIndex + 3));
                            $( "label.error" ).remove();
                        }
                    } else {
                        $.History.go('#/step' + (stepIndex + 3));
                        $( "label.error" ).remove();
                    }
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
                $( "label.error" ).remove();
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
                $( "label.error" ).remove();
                state = CKEDITOR.instances['statementEditor'].getData();
                if (state) {
                    if(stateLength != '') {
                        state = state.trim().replace(/(<p>|<\/p>)/g, '');
                        state = state.trim().replace(/&nbsp;/g, '');
                        state = state.trim().replace(wordCountRegex, ' ');
                        wordCount = state.split(' ').length;
                        if(wordCount > stateLength) {
                            $('<label class="error">Your Statement Word Count: ' + wordCount + '. Maximum Word Count: ' + stateLength + '</label>').insertBefore("textarea#statementEditor");
                            $('html, body').animate({ scrollTop: 0 }, 0);
                        } else {
                            $.History.go('#/step' + (stepIndex + 3));
                            $( "label.error" ).remove();
                        }
                    } else {
                        $.History.go('#/step' + (stepIndex + 3));
                        $( "label.error" ).remove();
                    }
                } else {
                    $(errorMessage).insertBefore("textarea#statementEditor");
                    $('html, body').animate({ scrollTop: 0 }, 0);
                }
            }
        }
        else if (Drupal.settings.steps[stepIndex] == 'bio-resume') {
            if (jQuery.inArray('bio', Drupal.settings.required) !== -1 && jQuery.inArray('resume', Drupal.settings.required) !== -1){
                $( "label.error" ).remove();
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
            /* works = $("input[class=ap-check]:checked").length; */
	    works = $("div.row.ap-row").length;
            works = works - 1;
            maxAllowed = Drupal.settings.works.max;
            minAllowed = Drupal.settings.works.min;
            if (works <= maxAllowed && works >= minAllowed){
                $.History.go('#/step'  + (stepIndex + 3));
                $( "label#artHelp" ).removeClass('error');
            } else {
                $("label#artHelp").addClass('error');
                $('html, body').animate({ scrollTop: 0 }, 0);
            }
        } else if (Drupal.settings.steps[stepIndex] == 'fields-uploads') {
            $( "label.error" ).remove();
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

    if (Drupal.settings.ap_artworks) {
        $('div.ap-artrow').addClass('hidden');
        $('span.ap-artwork').addClass('hidden');
        $.each(Drupal.settings.ap_artworks, function(key, value) {
            workVid = 'v' + key;
            workId = 'f' + value;
            $('div#' + workVid).removeClass('hidden');
            workIdEl = $('.ap-artwork#' + workId);
            $(workIdEl).removeClass('hidden');
        });
    }

    function htmlEntities(str) {
        return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
    }

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

        var resume = $( "#resumeContent" ).html();
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
            resume: resume,
            proposal: $('#proposalEditor').exists() ? CKEDITOR.instances['proposalEditor'].getData() : false,
            field1: $('#field1Editor').exists() ? CKEDITOR.instances['field1Editor'].getData() : false,
            field2: $('#field2Editor').exists() ? CKEDITOR.instances['field2Editor'].getData() : false,
            field3: $('#field3Editor').exists() ? CKEDITOR.instances['field3Editor'].getData() : false,
            field4: $('#field4Editor').exists() ? CKEDITOR.instances['field4Editor'].getData() : false,
            upload1: $('#upload1').length ? $('#upload1').val().split('\\').pop() : false,
            upload2: $('#upload2').length ? $('#upload2').val().split('\\').pop() : false,
            upload3: $('#upload3').length ? $('#upload3').val().split('\\').pop() : false,
            upload4: $('#upload4').length ? $('#upload4').val().split('\\').pop() : false,
            steps: steps,
            titles : Drupal.settings.titles
        };


        var confirmTemplate = $('#confirmTpl').html();
        var confirmHtml = Mustache.to_html(confirmTemplate, view);
        $('#profileAjax').html(confirmHtml);

        $('input[name=resumeMarkup]').val(resume);

        var additionalTemplate = $('#additionalTpl').html();
        var additionalHtml = Mustache.to_html(additionalTemplate, view);
        $('#additionalAjax').html(additionalHtml);
    }

    // set message if form field edited and not saved
    $("form :input").keyup(function() {
        $(window).on('beforeunload', function(){
            return 'You will lose the changes made in the form.';
        });
    });

});
})(jQuery);

