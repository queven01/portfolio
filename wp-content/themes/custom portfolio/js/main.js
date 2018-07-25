var $ = jQuery

$(document).ready(function(){
    $(window).scroll(function(){
        var scroll = $(window).scrollTop();

        if (scroll > 100) {
            $(".nav-scroll-background").fadeIn('slow');
        }

        else{
            $(".nav-scroll-background").fadeOut('slow');
        }
    })
});

function goBack() {
    window.history.back();
}

//Mobile Menu Icon
function toggleMenu(x) {
    x.classList.toggle("change");
}
$(document).ready(function() {
    $('.menu-icon').click(function () {
        $('#menu-main-menu').toggle();
    });
});