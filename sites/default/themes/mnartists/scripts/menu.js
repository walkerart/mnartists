(function ($) {
    $(function() {
        var menu = $("#menu");

        var lists = menu.find("ul.artist-community-menu, ul.community-content-menu, ul.my-stuff-menu");
        for(var i = 0, numLists = lists.length; i < numLists; i++) {
            var list = $(lists[i]);
            var items = list.find("li:has(div)");
            for (var j = 0, numItems = items.length; j < numItems; j++) {
                var item = $(items[j]);
                var link = item.find("a:first");
                link.after($("<a>", {
                    text: "+",
                    href: "#",
                    "class": "expand closed"
                }));
            }
        }

        lists.delegate("a.expand", "click", function(e) {
            e.preventDefault();
            var target = $(e.currentTarget);
            var expand = target.next();
            if (target.hasClass("closed")) {
                target.text("-")
                      .toggleClass("closed open");
                expand.slideDown();
            } else {
                target.text("+")
                      .toggleClass("closed open");
                expand.slideUp();
            }
        });

        menu.find(".menu-event-datepicker").datepicker({
            onSelect: function(dateText, inst) {
            console.log(dateText);
            }
        });

        // open menu sub-items that have selections
        $('div.item-list').each(function () {
            var targetEl = $(this);
            if (targetEl.find('.selected').length > 0) {
                targetEl.css('display', 'block');
            }
        });
    });
}(jQuery));
