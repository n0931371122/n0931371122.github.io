<!doctype html>
<html lang="zh">
	<head>
		<?php include "header-title.php"; ?>
	</head>
	<body>
        <div  class="background login">
        </div>
        <div class="login_background">
                <form id="login_form" method="post" action="" class="float-md-right mt-xl-5 mt-lg-4 pt-lg-4 pt-xl-3 mr-xl-5 pr-lg-5  mr-md-4">
                    <div id="login_logo" class="mx-auto"></div>
                    <div id="login_account_number" class="mt-xl-5 pb-xl-1 pb-1 pt-sm-4 pt-2 pt-sm-3">
                        <img src="images/login_person_icon.png" alt="" width="20" height="20">
                        <span class="ml-lg-2">帳號</span>
                        <input type="text" name="name" value="" autofocus class="border-0">
                    </div>
                    <div id="login_password"  class="mt-xl-5 mt-md-3 pb-0 pb-sm-1 pt-sm-4 pt-md-0 pt-2">
                        <img src="images/login_key_icon.png" alt="" width="20" height="20">
                        <span class="ml-lg-2">密碼</span>
                        <input type="password" name="password" value="" class="border-0">
                    </div>
                    <input id="login_button" type ="button" onclick="javascript:location.href='index.php'" value="登入"></input>
                    <div id="login_remember" class="pt-md-2 pt-sm-4">
                        <input type="checkbox" name="remember_me" class="float-left mt-xl-1 mt-md-2">
                        <p class="float-left ml-2">記住帳號</p>
                    </div>
                    
                </form>
                <p id="copyright">
                    <span>Copyright © 2017 TOPMOST CONSULTING Co., LTD. Arights Reserved.</span>
                    <span>&nbsp;&nbsp;&nbsp;DESIGN BY <a href="https://minmax.tw/" target="_blank">MINMAX</a></span>
                </p>
            </div>
        <script>

                resizeCss();
                $(window).resize(function() {
                    resizeCss();
                });

                function resizeCss() {

                    $window_width=$(window).width();
                    if($window_width<=768 && $window_width>576 && $(window).height()<$window_width){
                        $(".login_background").addClass("for_hor");
                       
                    }
                    else{
                        $(".login_background").removeClass("for_hor");
                    }
                    if($window_width<=380){
                        $width=$(".login_background").width();
                        $(".login_background").css("height",$width*1300/807);
                        $height=$(".login_background").height();
                        $("#copyright").css({'width':$width,'top':$height});
                    }
                    else if($window_width<576){
                        $width=$(".login_background").width();
                        $(".login_background").css("height",$width*1200/807);
                        $height=$(".login_background").height();
                     
                        $("#copyright").css({'width':$width,'top':$height});
                    }
                    else{
                         $(".login_background").removeAttr("style");
                         $("#copyright").removeAttr("style");
                    }
                }

            </script>
	</body>
</html>