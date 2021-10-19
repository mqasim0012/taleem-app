$(document).ready(function() {
    $('.login').click(function() {
        $('html, body').animate({
            scrollTop: $(".Aims").offset().top
        }, 1000);
    });
    $('.menu-icon').on('click', function() {
        $('header ul').slideToggle();
    });
    $('.toggle-signup').on('click', function() {
        $('.form-signup').slideToggle();
        $('#borderBottom').slideToggle();
        $('html, body').animate({
            scrollTop: $(".form-signup").offset().top
        }, 1000);
    });
});