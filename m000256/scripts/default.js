/* ==========================================================================
    header.php
 ==========================================================================*/
//漢堡條
var Menu = {
    el: {
        menuToggle: $('.menu-toggle'),
        menuTop: $('.menu-top'),
        menuMiddle: $('.menu-middle'),
        menuBottom: $('.menu-bottom')
    },
    init: function () {
        Menu.bindUIactions();
    },
    bindUIactions: function () {
        Menu.el.menuToggle
            .on(
            'click',
            function (event) {
                Menu.activateMenu(event);
                event.preventDefault();
                
            }
            );
    },
    activateMenu: function () {   

        Menu.el.menuTop.toggleClass('menu-top-click');
        Menu.el.menuMiddle.toggleClass('menu-middle-click');
        Menu.el.menuBottom.toggleClass('menu-bottom-click');
        $("#user_for_phone").toggleClass("active");     
        $("#accordion").toggleClass("active");

        $(".main").toggleClass("menu_open");
        $("#copyright").toggleClass("menu_open");
        $("#accordion_gray_verti_bar").toggleClass("active");

     }
};
Menu.init();

/*手風琴用 */
$("#accordion").click(function () {
    $level_1_target = $(event.target).parents().filter(function(){
        return $(this).hasClass("level_1");
    })
    $level_1_target.parents(".panel").siblings().children().removeClass("active").children("a").children("svg").attr("fill", "white");

    $level_1_target.toggleClass("active");
    if ($level_1_target.hasClass("active")){
        $level_1_target.children().children("svg").attr("fill", "rgb(32,97,162)");
    }
    else{
        $level_1_target.children().children("svg").attr("fill", "white");
    }

    $level_2_target = $(event.target).parents().filter(function () {
        return $(this).hasClass("level_2");
    })
    $level_2_target.parents(".panel").siblings().children().removeClass("active");
    $level_2_target.toggleClass("active");

    $level_3_target = $(event.target).parents().filter(function () {
        return $(this).hasClass("level_3");
    })
    $level_3_target.parents(".panel").siblings().children().removeClass("active");
    $level_3_target.toggleClass("active");
});


$(".panel_1").click(function () {
    if ($(this).children("div:odd").attr("style", "displya:none")) {
        $(this).children("div:odd").attr("style", "displya:block");
    }
    $(this).siblings(".panel_1").children("div:odd").slideUp(600, function () { $(this).removeClass("show") });


});
/*右上角user_menu_toggle用 */
$("#user").click(function(){
    
    $("#user_menu_toggle").toggleClass("active");
    $("#user_menu").toggleClass("actived");
    $("#user_menu_toggle_phone").toggleClass("active");
    $("#user_menu_phone").toggleClass("actived");
    $("#accordion").toggleClass("user_menu_actived");    
});
/*手機版user_menu_toggle_phone用*/
$("#user_for_phone").click(function(){
    $("#user_menu_toggle").toggleClass("active");
    $("#user_menu").toggleClass("actived");
    $("#user_menu_toggle_phone").toggleClass("active");
    $("#user_menu_phone").toggleClass("actived");
    $("#accordion").toggleClass("user_menu_actived");    
});




/* ==========================================================================
    index.php page1.php page2.php
 ==========================================================================*/

(function ($) {
    $(window).on("load", function () {
        $(".content").mCustomScrollbar();
        $("#accordion").mCustomScrollbar();
    });
})(jQuery);
$(".content").mCustomScrollbar({
    axis: "x", // horizontal scrollbar
    advanced: { autoExpandHorizontalScroll: false }

});
$("#accordion").mCustomScrollbar({
    setTop: "100px",
    axis: "y",
    advanced: { autoExpandHorizontalScroll: false }
});



/* ==========================================================================
    index.php
 ==========================================================================*/
/*查詢表單 */
function toggle_search_form(){
    $(".block_style").eq(0).slideToggle();
    $("#search_form_switch").prop("checked") ? $("#search_form_switch").prop("checked", false) : $("#search_form_switch").prop("checked", true);
}
$("#search_form_switch").change(function () {
    $(".block_style").eq(0).slideToggle();
});

/*報表結果*/
function toggle_index_reporter_table() {
    $(".block_style").eq(1).slideToggle();
    resizeCss();
    $("#reporter_table_switch").prop("checked") ? $("#reporter_table_switch").prop("checked", false) : $("#reporter_table_switch").prop("checked", true);
}
$("#reporter_table_switch").change(function () {
    $(".block_style").eq(1).slideToggle();
    resizeCss();
});

/* ==========================================================================
    page1.php
 ==========================================================================*/
/*現有折扣 */
function toggle_discount() {
    $(".block_style").eq(0).slideToggle();
    $("#discount_switch").prop("checked") ? $("#discount_switch").prop("checked", false) : $("#discount_switch").prop("checked", true);
}
$("#discount_switch").change(function () {
    $(".block_style").eq(0).slideToggle();
});
/*新增表單 */
function toggle_add_new_form() {
    $(".block_style").eq(1).slideToggle();
    $("#add_newForm_switch").prop("checked") ? $("#add_newForm_switch").prop("checked", false) : $("#add_newForm_switch").prop("checked", true);
}
$("#add_newForm_switch").change(function () {
    $(".block_style").eq(1).slideToggle();
});
/*報表結果 */
function toggle_reporter_table() {
    $(".block_style").eq(2).slideToggle();
    $("#reporter_result_switch").prop("checked") ? $("#reporter_result_switch").prop("checked", false) : $("#reporter_result_switch").prop("checked", true);
}
$("#reporter_result_switch").change(function () {
    $(".block_style").eq(2).slideToggle();
});

/* ==========================================================================
    page2.php
 ==========================================================================*/
/*查詢或新增 */
function toggle_inquire_or_add() {
    $(".block_style").eq(0).slideToggle();
    $("#inquire_or_add_switch").prop("checked") ? $("#inquire_or_add_switch").prop("checked", false) : $("#inquire_or_add_switch").prop("checked", true);

}
$("#inquire_or_add_switch").change(function () {
    $(".block_style").eq(0).slideToggle();
});


/*查詢或新增結果 */
function toggle_inquire_result1() {
    $(".block_style").eq(1).slideToggle();
    $("#inquire_result1_switch").prop("checked") ? $("#inquire_result1_switch").prop("checked", false) : $("#inquire_result1_switch").prop("checked", true);
}
$("#inquire_result1_switch").change(function () {
    $(".block_style").eq(1).slideToggle();
});
/*常用部品維護 */
function toggle_maintain() {
    $(".block_style").eq(2).slideToggle();
    $("#maintain_switch").prop("checked") ? $("#maintain_switch").prop("checked", false) : $("#maintain_switch").prop("checked", true);
}
$("#maintain_switch").change(function () {
    $(".block_style").eq(2).slideToggle();
});
/*常用部品維護結果*/
function toggle_inquire_result2() {
    $(".block_style").eq(3).slideToggle();
    $("#inquire_result2_switch").prop("checked") ? $("#inquire_result2_switch").prop("checked", false) : $("#inquire_result2_switch").prop("checked", true);
}
$("#inquire_result2_switch").change(function () {
    $(".block_style").eq(3).slideToggle();
});








/*報表結果排序*/
$.tablesorter.addParser({
    id: "ddmmyyyy",
    is: function (s) {
        return false;
    },
    format: function (s, table, cell, cellIndex) {
        var c = table.config, ci = c.headerList[cellIndex],
            x = s;
        s = s
            // replace separators
            .replace(/\s+/g, " ").replace(/[\-|\.|\,]/g, "/")
            // reformat dd/mm/yy to mm/dd/yy
            .replace(/(\d{1,2})[\/\s](\d{1,2})[\/\s](\d{2})/, "$2/$1/$3");
        return $.tablesorter.formatFloat((new Date(s).getTime() || ''), table);
    },
    type: "numeric"
});

$('table').tablesorter({

});


/*page1.php 上傳按鈕用 */
$('#chooseFile').bind('change', function () {
    var filename = $("#chooseFile").val();
    if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');
        $("#noFile").text("未選擇任何檔案");
    }
    else {
    $(".file-upload").addClass('active');
        filename = filename.replace("C:\\fakepath\\", "");
        if (filename.length>20){
            filename = filename.substr(0,17)+"...";
        }
        $("#noFile").text(filename);

    }
    });




/* ==========================================================================
    * 螢幕縮放動作
==========================================================================*/
$(window).resize(function() {
    resizeCss();
});

function resizeCss() {
    /*login.php 判別裝置是否長大於寬 修正圖片位置*/
    $window_width = $(window).width();
    if ($window_width <= 768 && $window_width > 576 && $(window).height() < $window_width) {
        $(".login_background").addClass("for_hor");
    }
    else {
        $(".login_background").removeClass("for_hor");
    }
    /*login.php 調整圖片用 */
    if ($window_width <= 380) {
        $width = $(".login_background").width();
        $(".login_background").css("height", $width * 1300 / 807);
        $height = $(".login_background").height();
        $("#copyright").css({ 'width': $width, 'top': $height });
    }
    else if ($window_width < 576) {
        $width = $(".login_background").width();
        $(".login_background").css("height", $width * 1200 / 807);
        $height = $(".login_background").height();

        $("#copyright").css({ 'width': $width, 'top': $height });
    }
    else {
        $(".login_background").removeAttr("style");
        $("#copyright").removeAttr("style");
    }
}



