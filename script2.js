$(window).scroll(function (event) {
    var scroll = $(window).scrollTop();
    $('.left').css('right', + scroll / 4);
    $('.right').css('left', + scroll / 4);
});


$(document).ready(function() {
        $(window).scroll(function(event) {
            let scroll = $(this).scrollTop();
            let opacity = 1 - (scroll / 1000);
            if (opacity >= 0) {
                $('.left').css('opacity', opacity);
            }
        });
    });

$(document).ready(function() {
        $(window).scroll(function(event) {
            let scroll = $(this).scrollTop();
            let opacity = 1 - (scroll / 1000);
            if (opacity >= 0) {
                $('.right').css('opacity', opacity);
            }
        });
    });