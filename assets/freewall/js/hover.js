var numberOfImages = $(".imagesWithHover").length;
var numberOfDivOverlays = $(".showMeOnImageHover").length;
for (var i = 0; i < numberOfDivOverlays; i++) {
    var width = $(".imagesWithHover:eq(" + i + ")").width();
    var height = $(".imagesWithHover:eq(" + i + ")").height();
    var left = $(".imagesWithHover:eq(" + i + ")").position().left;
    var top = $(".imagesWithHover:eq(" + i + ")").position().top;
    $(".showMeOnImageHover:eq(" + i + ")").css({
        width: width,
        height: height,
        left: left,
        top: top
    });
}
$(".showMeOnImageHover").css("opacity", 0);
$(".showMeOnImageHover").hover(function () {
    $(this).animate({
        "opacity": 1
    }, 500);
}, function () {
    $(this).animate({
        "opacity": 0
    }, 500);
});