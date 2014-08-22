/**
 * @author       Rob W <gwnRob@gmail.com>
 * @website      http://stackoverflow.com/a/7513356/938089
 * @version      20120724
 * @description  Executes function on a framed YouTube video (see website link)
 *               For a full list of possible functions, see:
 *               https://developers.google.com/youtube/js_api_reference
 * @param String frame_id The id of (the div containing) the frame
 * @param String func     Desired function to call, eg. "playVideo"
 *        (Function)      Function to call when the player is ready.
 * @param Array  args     (optional) List of arguments to pass to function func
 */
function callPlayer(frame_id, func, args) {
    if (window.jQuery && frame_id instanceof jQuery) frame_id = frame_id.get(0).id;
    var iframe = document.getElementById(frame_id);
    if (iframe && iframe.tagName.toUpperCase() != 'IFRAME') {
        iframe = iframe.getElementsByTagName('iframe')[0];
    }

    // When the player is not ready yet, add the event to a queue
    // Each frame_id is associated with an own queue.
    // Each queue has three possible states:
    //  undefined = uninitialised / array = queue / 0 = ready
    if (!callPlayer.queue) callPlayer.queue = {};
    var queue = callPlayer.queue[frame_id],
        domReady = document.readyState == 'complete';

    if (domReady && !iframe) {
        // DOM is ready and iframe does not exist. Log a message
        window.console && console.log('callPlayer: Frame not found; id=' + frame_id);
        if (queue) clearInterval(queue.poller);
    } else if (func === 'listening') {
        // Sending the "listener" message to the frame, to request status updates
        if (iframe && iframe.contentWindow) {
            func = '{"event":"listening","id":' + JSON.stringify('' + frame_id) + '}';
            iframe.contentWindow.postMessage(func, '*');
        }
    } else if (!domReady || iframe && (!iframe.contentWindow || queue && !queue.ready)) {
        if (!queue) queue = callPlayer.queue[frame_id] = [];
        queue.push([func, args]);
        if (!('poller' in queue)) {
            // keep polling until the document and frame is ready
            queue.poller = setInterval(function () {
                callPlayer(frame_id, 'listening');
            }, 250);
            // Add a global "message" event listener, to catch status updates:
            messageEvent(1, function runOnceReady(e) {
                var tmp = JSON.parse(e.data);
                if (tmp && tmp.id == frame_id && tmp.event == 'onReady') {
                    // YT Player says that they're ready, so mark the player as ready
                    clearInterval(queue.poller);
                    queue.ready = true;
                    messageEvent(0, runOnceReady);
                    // .. and release the queue:
                    while (tmp = queue.shift()) {
                        callPlayer(frame_id, tmp[0], tmp[1]);
                    }
                }
            }, false);
        }
    } else if (iframe && iframe.contentWindow) {
        // When a function is supplied, just call it (like "onYouTubePlayerReady")
        if (func.call) return func();
        // Frame exists, send message
        iframe.contentWindow.postMessage(JSON.stringify({
            "event": "command",
                "func": func,
                "args": args || [],
                "id": frame_id
        }), "*");
    }
    /* IE8 does not support addEventListener... */
    function messageEvent(add, listener) {
        var w3 = add ? window.addEventListener : window.removeEventListener;
        w3 ? w3('message', listener, !1) : (add ? window.attachEvent : window.detachEvent)('onmessage', listener);
    }
}

function addJavascript(jsname, pos) {
    var th = document.getElementsByTagName(pos)[0];
    var s = document.createElement('script');
    s.setAttribute('type', 'text/javascript');
    s.setAttribute('src', jsname);
    th.appendChild(s);
}

function loadPageVar (sVar) {
  return decodeURI(window.location.search.replace(new RegExp("^(?:.*[&\\?]" + encodeURI(sVar).replace(/[\.\+\*]/g, "\\$&") + "(?:\\=([^&]*))?)?.*$", "i"), "$1"));
}


jQuery(document).ready(function () {
    jQuery(".field-name-field-media, .view-artist-artworks").fitVids();

    var slideContainerSelectors = [
        ".field-name-field-media"
    ];
    var slideSelectors = [
        ".field-items"
    ];
    var slideItemSelectors = [
        ".field-item"
    ];

    for (var i = 0, len = slideContainerSelectors.length; i < len; i++) {
        var slideContainerSelector = slideContainerSelectors[i];
        var slideSelector = slideSelectors[i];
        var slideItemSelector = slideItemSelectors[i];

        var slideContainer = jQuery(slideContainerSelector);
        if (slideContainer == undefined) {
            continue;
        }
        slideContainer.each(function () {
            var $this = jQuery(this);
            var slideElem = $this.find(slideSelector);
            var slideItems = slideElem.find(slideItemSelector);
            var maxHeight = 0;

            if (slideItems.length > 1) {
                slideItems.each(function () {
                    var item = jQuery(this);
                    var child = item.children();
                    var testHeight = item.height();
                    if (child.hasClass('file-video-vimeo')) {
                        if (typeof Froogaloop == 'undefined') addJavascript('http://a.vimeocdn.com/js/froogaloop2.min.js', 'head');
                    } else if (child.hasClass('file-audio-soundcloud')) {
                        if (typeof SC == 'undefined') addJavascript('https://w.soundcloud.com/player/api.js', 'head');
                    } else {
                        var images = item.find('img');
                        if (images.length > 0) {
                            var firstImageEl = jQuery(images[0]);
                            var naturalHeight = parseInt(firstImageEl.attr('height'));
                            var setMaxHeight = parseInt(firstImageEl.css('max-height'));
                            testHeight = (naturalHeight < setMaxHeight) ? naturalHeight : setMaxHeight;
                        }
                    }
                    maxHeight = testHeight > maxHeight ? testHeight : maxHeight;
                });
                slideElem.slidesjs({
                    width: slideContainer.width(),
                    height: maxHeight
                });
            }
        });
    }
    jQuery(".slidesjs-navigation").click(function () {
        for (var i = 0, len = slideContainerSelectors.length; i < len; i++) {
            var slideContainerSelector = slideContainerSelectors[i];
            var slideSelector = slideSelectors[i];
            var slideItemSelector = slideItemSelectors[i];

            var slideContainer = jQuery(slideContainerSelector);
            if (slideContainer == undefined) {
                continue;
            }
            slideContainer.each(function () {
                var $this = jQuery(this);
                var slideElem = $this.find(slideSelector);
                var slideItems = slideElem.find(slideItemSelector);

                jQuery.each(slideItems, function () {
                    var item = jQuery(this);
                    var child = item.children();
                    if (child.hasClass('file-video-vimeo')) {
                        var iframe = item.find('.media-vimeo-player');
                        var iframe = iframe[0];
                        var vplayer = Froogaloop(iframe);
                        vplayer.api('pause');
                    }
                    if (child.hasClass('file-video-youtube')) {
                        var iframe = item.find('.media-youtube-player');
                        var iframe = iframe[0];
                        var frameid = iframe.getAttribute('id');
                        callPlayer(frameid, 'pauseVideo');
                    }
                    if (child.hasClass('file-audio-soundcloud')) {
                        var iframe = item.find('iframe');
                        var iframe = iframe[0];
                        var splayer = SC.Widget(iframe);
                        splayer.pause();
                    }
                });
            });
        }
    });
    // jQuery('.form-checkbox').prettyCheckable();
    // jQuery('.form-radio').prettyCheckable();

    // Set a limit on how many checkbox/radio elements
    // we'll apply iCheck to. Mostly meant to improve
    // performance on admin pages with lots of checkboxes,
    // though maybe we want to expand this a bit?
    var maxCheckboxAndRadioElements = 50;
    var targetCheckboxAndRadioElements = jQuery('.form-type-checkbox input, .form-type-radio input').not('.form-item-field-op-required-und input, .form-item-field-op-optional-und input');//remove for hidden fields in opportunity section;
    if (!(jQuery('body').hasClass('page-admin')) &&
        targetCheckboxAndRadioElements.length < maxCheckboxAndRadioElements) {
        targetCheckboxAndRadioElements.iCheck().on("ifChanged",function(e){
            var isChecked = jQuery(e.delegateTarget).is(":checked");
            var checkedLabel = jQuery(e.delegateTarget).parents(".form-item:first").find("label");
            if (isChecked) {
                checkedLabel.addClass("active");
            } else {
                checkedLabel.removeClass("active");
            }
        });
        jQuery('.form-type-checkbox input:checked, .form-type-radio input:checked').each(function(){
            jQuery(this).parents(".form-item:first").find("label").addClass("active");

        });
    }

    // select boxes
    // jQuery('select.form-select').customSelect();

    // nice file input
    jQuery('input[type=file]').nicefileinput();

    // attach to sidebar button
    var sidebarButton = jQuery('.sidebar-button');
    sidebarButton.click(function (evt) {
        evt.preventDefault();
        jQuery('body').toggleClass('sidebar-show');
    });


    jQuery(document).bind('flagGlobalAfterLinkUpdate', function(event, data) {

        var flagEl = jQuery(data.link);
        var verbEl = flagEl.siblings('ul').find('li.follow-this a .flag-verb');
        var parentUlEl = (flagEl.parent().parent().hasClass('follow-menu')) ? flagEl.parent().parent() : flagEl.parent().parent().parent().parent();
        var hasUnflagLinks = (parentUlEl.find('a.unflag-action').length > 0);

        if (data.flagStatus === 'unflagged' && verbEl) {
            verbEl.text('Follow');
            parentUlEl.removeClass('collected');
        } else if (data.flagStatus === 'flagged' && verbEl) {
            verbEl.text('Unfollow');
            parentUlEl.addClass('collected');
        } else if (data.flagStatus === 'unflag' && !hasUnflagLinks) {
            parentUlEl.removeClass('collected');
        } else if (data.flagStatus === 'flag') {
            parentUlEl.addClass('collected');
        }
    });


});