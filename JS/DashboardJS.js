$(document).ready(function() {
    $('.menu-icon').on('click', function() {
        $('header ul').slideToggle();
    });
    let subjectCount = 6;
    $(".trigger").click(function() {
        subjectCount = subjectCount + 6;
        $(".subject-container").load("Includes/load-subs.inc.php", {
            subjectNewCount: subjectCount
        });
    });
});