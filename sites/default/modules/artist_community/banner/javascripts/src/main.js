(function($) {
    var taglines = [
            'is a platform to connect designers, readers & organizations.',
            'is a platform to connect craftspeople, collectors & venues.',
            'is a platform to connect performers, curators & opportunities.',
            'provides access to and engagement with Minnesota’s arts culture.',
            'loves you.',
            'can be used as a dating site.',
            'is a website.'
        ],
        taglinesContainer = '',
        currentTagline = '',
        taglinesLength = taglines.length,
        taglinesIteration = 0,
        index = 0,
        logoPartPositionX = 0,
        logoPartPositionY = 0,
        logoPartsType = Math.floor(Math.random()*6) + 1;


    $.fn.drags = function(opt) {

        opt = $.extend({handle:"",cursor:"move"}, opt);

        if(opt.handle === "") {
            var $el = this;
        } else {
            var $el = this.find(opt.handle);
        }

        return $el.css('cursor', opt.cursor).on("mousedown", function(e) {
            if(opt.handle === "") {
                var $drag = $(this).addClass('draggable');
            } else {
                var $drag = $(this).addClass('active-handle').parent().addClass('draggable');
            }
            var z_idx = $drag.css('z-index'),
                drg_h = $drag.outerHeight(),
                drg_w = $drag.outerWidth(),
                pos_y = $drag.offset().top + drg_h - e.pageY,
                pos_x = $drag.offset().left + drg_w - e.pageX;
            $drag.css('z-index', 1000).parents().on("mousemove", function(e) {
                $('.draggable').offset({
                    top:e.pageY + pos_y - drg_h,
                    left:e.pageX + pos_x - drg_w
                }).on("mouseup", function() {
                    $(this).removeClass('draggable').css('z-index', z_idx);
                });
            });
            e.preventDefault(); // disable selection
        }).on("mouseup", function() {
            if(opt.handle === "") {
                $(this).removeClass('draggable');
            } else {
                $(this).removeClass('active-handle').parent().removeClass('draggable');
            }
        });

    }

    var updateTaglines = function() {
        index = 0;

        taglinesContainer.fadeOut(250, function() {
            taglinesContainer.empty().show();
            setTimeout(function() {
                showTagline(taglines[taglinesIteration]);
            }, 500);
        });

        if (taglinesIteration < (taglinesLength - 1)) {
            taglinesIteration++;
        } else {
            taglinesIteration = 0;
        }
    };

    var showTagline = function(currentTagline) {
        if (index < currentTagline.length) {
            $(taglinesContainer).append(currentTagline[index++]);
            setTimeout(function() {
                showTagline(currentTagline);
            }, 20);
        }
    };

    var positionLogoParts = function() {
        $('.logo-parts').addClass('logo-parts-' + logoPartsType);
        $('.logo-parts li').each(function() {
            logoPartPositionX = logoPartPositionX + Math.floor(Math.random()*33) + 10;
            logoPartPositionY = (50 * Math.floor(Math.random()*5)) + 24;
            $(this).css('left', logoPartPositionX + '%').css('top', logoPartPositionY + 'px').addClass('visible');
        });
    };

    $(document).ready(function() {

        if ($('.organization-header').length) {
            if ($('.organization-header').hasClass('has-taglines')) {
                $('.organization-header').append('<div class="taglines" />');
                taglinesContainer = $('.organization-header .taglines');
                updateTaglines();
                var taglinesInterval = setInterval(function() {
                    updateTaglines();
                }, 5000);
            }
            positionLogoParts();
            $('.logo-parts li').drags();
        }

    });
})(jQuery);