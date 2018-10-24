(function($) {

    // init controller
    var controller = new ScrollMagic.Controller();
    // build scene
    var scene = new ScrollMagic.Scene({triggerElement: "#pota-loader", triggerHook: "onEnter"})
    .addTo(controller)
    .on("enter", function (e) {
        
        var url        = $('.pota-data-nextpage').data('url');
        var page       = $('.pota-data-nextpage').data('page');
        var nextpage   = page + 1;
        var maxpage    = $('.pota-data-nextpage').data('maxpage');
        var id         = $('.pota-data-nextpage').data('id');

       /* console.log(maxpage);
        console.log(page);
        console.log(maxpage != page);*/
        if (maxpage != page) {
            if ($('body').hasClass('header-scroll')) {
                if (!$("#loader").hasClass("active")) {
                    $("#loader").addClass("active");
                    window.location.href = url + nextpage;
                    if (console){
                        console.log("loading new items");
                    }
                }
            }
        }
    });

} (jQuery));