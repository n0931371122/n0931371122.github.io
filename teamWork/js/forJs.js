document.write("<script src='js/popper.js'></script>");
document.write(" <script src='js/bootstrap.min.js'></script>");
document.write("<script src='js/aos.js'></script>");
document.write("<script src='js/lightbox.min.js'></script>");
document.write("<script src='js/swiper.min.js'></script>");
var script_name = document.location.pathname.match(/[^\/]+$/)[0];
var index = 0;
switch (script_name) {
    case "index.html": index = 0; break;
    case "food.html": index = 1; break;

    case "news_news.html":
    case "news_ads.html": index = 2; break;

    case "aboutus_contact.html":
    case "aboutus_intro.html":
    case "aboutus_join.html.html":
    case "aboutus_recruit.html": index = 3; break;

    case "store.html": index = 4; break;
    case "family.html": index = 5; break;
}
if(index==0){

}
else{

    $("#navbarSupportedContent .nav-link").eq(index - 1).addClass("sub_selected");
    $("#navbarSupportedContent .nav-link").eq(index - 1).removeClass("text-white")
}




function init_logo() {
    if ($(window).outerWidth() > 500) {
        x = $("#navbarSupportedContent").position().left;
        $("#logo").css("left", x - 120);
        $("#logo").css("top", 10);
    }
    else{
        $("#logo").css("left",10);
        $("#logo").css("top", 10);  
        $(".ham").show();     
    }
}
$(window).resize(function () {
    init_logo();
});
init_logo();

function toggle_menu() {
    var menu = document.querySelector("#navbarSupportedContent");
    var ham = document.querySelector(".ham");
    menu.classList.toggle("active");
    ham.classList.toggle("active");

}