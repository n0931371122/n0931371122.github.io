

document.write("<html lang='zh_tw'>");
document.write("<head>");
document.write("      <meta charset='UTF-8'>");

document.write("     <link rel='shortcut icon' href='images/favicon.ico' type='image/x-icon' />");
document.write("      <link rel='stylesheet' href='css/swiper.min.css'>");
document.write("      <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>");
document.write("      <meta http-equiv='X-UA-Compatible' content='ie=edge'>");
document.write("      <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css' integrity='sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb' crossorigin='anonymous'>");
document.write("      <link rel='stylesheet' href='css/lightbox.min.css'>");
document.write("      <link rel='stylesheet' href='css/swiper.min.css'>");
document.write("      <link href='css/aos.css' rel='stylesheet'>");
document.write("      <link rel='stylesheet' href='css/style.css'>");
document.write("      <script src='js/jquery-3.2.1.js'></script>");
document.write("      <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>");

document.write("      <title>西雅圖咖啡BARISTA</title>");
document.write("</head >");

document.write("<body>");

document.write("  <a href='index.html'><img  id='logo'  src='images/logo.png' alt=''></a>");
document.write("  <a href='index.html'><img  id='logo_complete'  src='images/logo_for_phone.png' alt=''></a>");

document.write("  <a href='https://www.facebook.com/baristacoffee.tw' id='fb'></a>");
document.write("  <div class='container'>");

document.write(" <div id='ham' onclick='toggle_navbar()'>");
document.write("  <span class='menu-global menu-top'></span>");
document.write(" <span class='menu-global menu-middle'></span>");
document.write("  <span class='menu-global menu-bottom'></span>");
document.write("  </div>");

document.write("     <nav class='navbar my_navbar navbar-expand-lg navbar-expand-md navbar-expand-sm fixed-top' id='my_navbar' style='background-color:rgb(150,2,0)'>");
document.write("         <div class='container'>");
document.write("             <div class=\'collapse navbar-collapse\' id=navbarSupportedContent>");
document.write("                 <ul class='navbar-nav mr-auto' >");

document.write("                     <li class='nav-item  text-center dropdown'>");
document.write("                         <a class='nav-link text-white font-weight-bold'  href='food.html?food=1'>產品資訊</a>");
document.write("                         <div class='dropdown-menu border-top-0 border-dark' aria-labelledby='navbarDropdownMenuLink'>");
document.write("                              <a class='dropdown-item text-white' href='food.html?food=1'>飲品類</a>");
document.write("                              <a class='dropdown-item text-white' href='food.html?food=2'>輕食類</a>");
document.write("                              <a class='dropdown-item text-white' href='food.html?food=3'>主廚推薦</a>");
document.write("                              <a class='dropdown-item text-white' href='food.html?food=4'>晨光早餐</a>");
document.write("                              <a class='dropdown-item text-white' href='food.html?food=5'>伴手禮品</a>");
document.write("                        </div>");
document.write("                     </li>");

document.write("                     <li class='nav-item  text-center dropdown'>");
document.write("                         <a class='nav-link text-white font-weight-bold' href='news_news.html'>活動訊息</a>");
document.write("                         <div class='dropdown-menu border-top-0 border-dark' aria-labelledby='navbarDropdown'>");
document.write("                              <a class='dropdown-item text-white' href='news_news.html'>最新消息</a>");
document.write("                              <a class='dropdown-item text-white' href='news_ads.html'>電視廣告</a>");
document.write("                          </div>");
document.write("                     </li>");

document.write("                     <li class='nav-item  text-center dropdown'>");
document.write("                          <a class='nav-link text-white font-weight-bold' href='aboutus_intro.html'>關於我們</a>");
document.write("                          <div class='dropdown-menu border-top-0 border-dark' aria-labelledby='navbarDropdown'>");
document.write("                              <a class='dropdown-item text-white' href='aboutus_intro.html'>公司簡介</a>");
document.write("                              <a class='dropdown-item text-white' href='aboutus_recruit.html'>人才招募</a>");
document.write("                              <a class='dropdown-item text-white' href='aboutus_join.html'>加盟資訊</a>");
document.write("                              <a class='dropdown-item text-white' href='aboutus_contact.html'>聯絡我們</a>");
document.write("                          </div>");
document.write("                     </li>");

document.write("                     <li class='nav-item  text-center '>");
document.write("                          <a class='nav-link text-white font-weight-bold' href='store.html'>店面資訊</a>");
document.write("                     </li>");
document.write("                     <li class='nav-item  text-center '>");
document.write("                          <a class='nav-link text-white font-weight-bold' href='family.html'>家族卡專區</a>");
document.write("                     </li>");

document.write("               </ul>");
document.write("            </div>");
document.write("       </div>");
document.write("    </nav>");

document.write("  <script>");
document.write("    $('#logo').fadeIn(1500)");
document.write("  </script>");


function toggle_navbar() {
    var menu = document.querySelector("#navbarSupportedContent");
    var ham = document.querySelector("#ham");
    menu.classList.toggle("active");
    ham.classList.toggle("active");
    $('.menu-top').toggleClass('menu-top-click');
    $('.menu-middle').toggleClass('menu-middle-click');
    $('.menu-bottom').toggleClass('menu-bottom-click');
}








