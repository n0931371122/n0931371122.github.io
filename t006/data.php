<?php
include 'main.php';
$subSQL = '';
$sDate = '';
$eDate = '';

if(ck_data('sDate') != ''){
    $sDate = ck_data('sDate');
    $subSQL .= " and substr(date,1,10) >= '".ck_data('sDate')."'";
}

if(ck_data('eDate') != ''){
    $eDate = ck_data('eDate');
    $subSQL .= " and substr(date,1,10) <= '".ck_data('eDate')."'";
}

$sql4 = "select * from contact where 1=1 ".$subSQL." order by id desc";
$contacts = $DBconnect->get_results($sql4);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>東煒大局</title>
    <link rel="icon" type="image/x-icon" href="styles/images/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;900&family=Noto+Sans+TC:wght@400;500;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="/styles/style.css" />
     <script src="/scripts/plugins/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
</head>
<body>
    <div id="data">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>東煒官網 - 客戶聯絡資料</h1>
            <div class="d-flex">
                <form class="d-flex align-items-center" action="">
                    <div class="date-wrapper">
                        <input class="date-element" type="text" id="sDate" name="sDate" value="<?php echo $sDate; ?>">
                        <i class="icon-date"></i>
                    </div>
                    <div class="px-2">-</div>
                    
                    <div class="date-wrapper">
                        <input class="date-element" type="text" id="eDate" name="eDate" value="<?php echo $eDate; ?>">
                        <i class="icon-date"></i>
                    </div>   
                    <button class="submit" type="submit">搜尋</button>
                </form> 
                   <button class="excel" type="button" onclick="window.location.href='downloadExcel.php?sDate=<?php echo $sDate; ?>&eDate=<?php echo $eDate; ?>';">
                       <span>匯出Excel</span>
                       <i class="icon-excel ms-1"></i>
                   </button>        
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>姓名</th>
                    <th>信箱</th>
                    <th>電話</th>
                    <th>建立日期</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if(!empty($contacts)){
                foreach($contacts as $key => $contact){
                    ?>
                    <tr>
                        <td><?php echo ($key+1); ?></td>
                        <td><?php echo $contact->names; ?></td>
                        <td><?php echo $contact->email; ?></td>
                        <td><?php echo $contact->tel; ?></td>
                        <td><?php echo $contact->date; ?></td>
                    </tr>
                    <?php
                }
            }?>

            </tbody>
        </table>
        <p>Copyright © <?php echo date('Y'); ?> Highwealth Construction. All Rights Reserved. </p>
    </div>
    <script>
        $(function() {
        $.datepicker.regional['zh-TW'] = {
            closeText: '關閉',
            prevText: '&#x3C;上月',
            nextText: '下月&#x3E;',
            currentText: '今天',
            monthNames: ['一月','二月','三月','四月','五月','六月',
            '七月','八月','九月','十月','十一月','十二月'],
            monthNamesShort: ['一月','二月','三月','四月','五月','六月',
            '七月','八月','九月','十月','十一月','十二月'],
            dayNames: ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'],
            dayNamesShort: ['周日','周一','周二','周三','周四','周五','周六'],
            dayNamesMin: ['日','一','二','三','四','五','六'],
            weekHeader: '周',
            dateFormat: 'yy-mm-dd',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: true,
            yearSuffix: '年'};

            $.datepicker.setDefaults($.datepicker.regional["zh-TW"]);
            $(".date-element").datepicker();
        });
    </script>
</body>
</html>