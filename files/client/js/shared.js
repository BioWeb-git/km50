var hideDataFrontEndHelper = function(){
    $('html *').removeAttr("data-frontend-helper");
    $('body').click(function() {
        $('.rsfh-lightbox-close').text("Fermer");
        $('.rsfh-lightbox-cancel').text("Annuler");
    });
};
var scrollClass = function(){
    var y = $(this).scrollTop();
    if (y > 200) {
        $("body").addClass("scroll");
    } else {
        $("body").removeClass("scroll");
    }
}
var scrollAnchor = function(){
    // Assign the HTML, Body as a variable...
    $viewport = $('html, body');

    $(".link-animate a, .link-animate").click(function (event) {
        //prevent the default action for the click event
        event.preventDefault();

        //get the full url - like mysitecom/index.htm#home
        var full_url = this.href;

        //split the url by # and get the anchor target name - home in mysitecom/index.htm#home
        var parts = full_url.split("#");
        var trgt = parts[1];

        //get the top offset of the target anchor
        var offset_value = $(".header-navigation").outerHeight() - 1;
        var target_offset = $("#" + trgt).offset();
        var target_top = target_offset.top - offset_value;

        //goto that anchor by setting the body scroll top to anchor top
        // EASES CURVES > https://jqueryui.com/resources/demos/effect/easing.html
        $viewport.animate({scrollTop: target_top}, 500, 'swing');

        $viewport.bind("scroll mousedown DOMMouseScroll mousewheel keyup", function () {
            $viewport.stop();
        });
    });
};
$(document).ready(function () {
    scrollAnchor();
    scrollClass();
});

$(window).on('load', function () {
    hideDataFrontEndHelper();
});

$(window).scroll(function () {
    scrollClass();
});