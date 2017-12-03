document.write("<script src='js/popper.js'></script>");
document.write(" <script src='js/bootstrap.min.js'></script>");
document.write("<script src='js/aos.js'></script>");
document.write("<script src='js/lightbox.min.js'></script>");
document.write("<script src='js/swiper.min.js'></script>");
var script_name = document.location.pathname.substr(1);

var index = 0;
switch (script_name) {
    case "":
    case "index.html": index = 0; break;
    case "teamWork/food.html": index = 1; break;

    case "teamWork/news_news.html":
    case "teamWork/news_ads.html": index = 2; break;

    case "teamWork/aboutus_contact.html":
    case "teamWork/aboutus_intro.html":
    case "teamWork/aboutus_join.html.html":
    case "teamWork/aboutus_recruit.html": index = 3; break;

    case "teamWork/store.html": index = 4; break;
    case "teamWork/family.html": index = 5; break;
}
if (index !== 0) {
    $("#navbarSupportedContent .nav-link").eq(index - 1).addClass("sub_selected");
    $("#navbarSupportedContent .nav-link").eq(index - 1).removeClass("text-white")
}
function init_logo() {
    if ($(window).outerWidth() > 1140) {
        x = $("#navbarSupportedContent").position().left;
        $("#logo").css("left", x - 100);
        $("#logo").css("top", 10);
        $("#logo").show();
    }
    else if ($(window).outerWidth() > 992 ){
        x = $("#navbarSupportedContent").position().left;
        $("#logo").css("left", x - 30);
        $("#logo").css("top", 10);
        $("#logo").show();
    }   
    else if ($(window).outerWidth() >= 768) {
        x = $("#navbarSupportedContent").position().left;
        $("#logo").css("left", x - 20);
        $("#logo").css("top", 10);
        $("#logo").show();
    }
    else if ($(window).outerWidth() > 576) {
        $("#logo").show();
    }
    else {
        $("#logo").css("left", 10);
        $("#logo").css("top", 10);
        $(".ham").show();
        $("#logo").hide();
        $("#logo_complete").show();
    }
}
$(window).resize(function () {
    init_logo();
});
init_logo();

$(window).scroll(function () {
    if ($(window).scrollTop() > 300) {
        $("#go_top").addClass("active");
    }
    else {
        $("#go_top").removeClass("active");
    }

});

function go_top(){
    var $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
    $body.animate({
        scrollTop: 0
    }, 600);
}
