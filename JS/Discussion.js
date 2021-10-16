$(document).ready(function() {
    let questionCount = 8;
    let clicked = false;

    $('.menu-icon').on('click', function() {
        $('header ul').slideToggle();
    });

    $('#post').on('click', function() {
        $('.qcontainer').slideToggle();
        if (!clicked) {
            document.getElementById('post').innerHTML = 'Hide';
        }
        if (clicked) {
            document.getElementById('post').innerHTML = 'Post a question';
        }
        clicked = !clicked;
    });

    $(".trigger").click(function() {
        questionCount = questionCount + 8;
        $(".qoftcontainer").load("../Includes/load-questions.inc.php", {
            questionNewCount: questionCount
        });
    });

    
    $('.q-footer #first').on('click', function() {

    });
});