<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:esun>
<head>
    <title>
        银河娱乐平台 - 历史号码走势
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Pragma" content="no-cache" />
    <link href="/Public/Home/images/chart/css/defaultright.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Home/images/chart/css/line.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/Public/Home/images/chart/css/base.css" />
    <style>
        esun\:* { behavior: url(#default#VML) }
    </style>
    <script type="text/javascript" src="/Public/Home/images/chart/js/jquery-1.9.1.js"> </script>
    <script type="text/javascript" src="/Public/Home/images/chart/js/line.js"> </script>
    <style>
        .date_links a { color: red; font-weight: bold; }
    </style>
    <style id="J-esun">
        esun\:* { behavior: url(#default#VML) }
    </style>
</head>

</head>
<body>
<body id="lan" style="background: url(static/images/chart/background_03.jpg) repeat-x center top; margin:10px;height:100%;">
<div id="right_01">
    <div class="right_01_01">
                <SPAN class="action-span1">
                        皇家娱乐 - <?php echo ($type_name1); ?>历史号码走势
                </SPAN>
    </div>
</div>
<script>
    $(function() {

        $("#chartsTable tr .bottomtd").css("border-bottom-color", "#FFFFFF");
        $("#chartsTable tr .bottomtd").css("border-bottom-width", "1px");

        if ($(window).width() > 1000) {
            $("#titlemessage").css('width', '100%');
            $("#right_01").css('width', '100%');
        }

        $("#navbutton,#symbol").show();
        drawLine();
        //计算冷热
        weiBall.forEach(function (val,index) {
            var newArr = [];
            val.forEach(function (v,id) {
                newArr.push(v);
            });
            var  newArr = ballSort(newArr);
            val.forEach(function (v,id) {
                if($.inArray(id,newArr)<3){
                    $('div[isball='+index+'-'+id+']').each(function (idx,vl) {
                        $(this).attr('class','ball0 therm00');
                    });
                }else if($.inArray(id,newArr)><?php echo ($assist['ntn']-4); ?>){
                    $('div[isball='+index+'-'+id+']').each(function (idx,vl) {
                        $(this).attr('class','ball2 therm02');
                    });
                }else{
                    $('div[isball='+index+'-'+id+']').each(function (idx,vl) {
                        $(this).attr('class','ball1 therm01');
                    });
                }
            });
        });
        //计算遗漏条
        louBall.forEach(function (val,index) {
            var len = $('td[lostball='+index+']').length;
            if(index>0 && val > 0){
                var le = 0;
                for (var i=len-1;i>=0;i--){
                    if(le < val){
                        $($('td[lostball='+index+']')[i]).addClass('lostcolor');
                        $($('td[lostball='+index+']')[i]).removeClass('wdh');
                    }
                    le++;
                }
            }
        });
    });

    function ballSort(arr){
        var newArr = [];
        for(var i =0; i<arr.length;i++){
            newArr.push(arr[i]);
        }
        arr = arr.sort(function(x,y){
            if (x < y) {
                return 1;
            } else if (x > y) {
                return -1;
            } else {
                return 0;
            }
        });
        var narr = [];
        arr.forEach(function (val,index){
            newArr.forEach(function (v,idx) {
                if(val == v){
                    if($.inArray(idx,narr) < 0){
                        narr.push(idx);
                    }
                }
            });
        });
        return narr;
    }

    //偵測瀏覽器部分 TODO: 應該放在 util 函式內
    var BrowserDetect = {
        init: function() {
            this.browser = this.searchString(this.dataBrowser) || "Other";
            this.version = this.searchVersion(navigator.userAgent) || this.searchVersion(navigator.appVersion) || "Unknown";
        },
        searchString: function(data) {
            for (var i = 0; i < data.length; i++) {
                var dataString = data[i].string;
                this.versionSearchString = data[i].subString;

                if (dataString.indexOf(data[i].subString) !== -1) {
                    return data[i].identity;
                }
            }
        },
        searchVersion: function(dataString) {
            var index = dataString.indexOf(this.versionSearchString);
            if (index === -1) {
                return;
            }

            var rv = dataString.indexOf("rv:");
            if (this.versionSearchString === "Trident" && rv !== -1) {
                return parseFloat(dataString.substring(rv + 3));
            } else {
                return parseFloat(dataString.substring(index + this.versionSearchString.length + 1));
            }
        },

        dataBrowser: [{
            string: navigator.userAgent,
            subString: "Edge",
            identity: "MS Edge"
        },
            {
                string: navigator.userAgent,
                subString: "MSIE",
                identity: "Explorer"
            },
            {
                string: navigator.userAgent,
                subString: "Trident",
                identity: "Explorer"
            },
            {
                string: navigator.userAgent,
                subString: "Firefox",
                identity: "Firefox"
            },
            {
                string: navigator.userAgent,
                subString: "Opera",
                identity: "Opera"
            },
            {
                string: navigator.userAgent,
                subString: "OPR",
                identity: "Opera"
            },

            {
                string: navigator.userAgent,
                subString: "Chrome",
                identity: "Chrome"
            },
            {
                string: navigator.userAgent,
                subString: "Safari",
                identity: "Safari"
            }]
    };

    BrowserDetect.init();
    //偵測瀏覽器部分 TODO: 應該放在 util 函式內 END
    function drawLine() {
        $("canvas").remove();
        $('.IELine').remove();
        DrawLine.bind("chartsTable", "has_line");

        DrawLine.color('#499495');
        DrawLine.add((parseInt(0) * <?php echo ($assist['ntn']); ?> + <?php echo ($assist['ns']); ?> + 1), 2, <?php echo ($assist['ntn']); ?>, 0);
        DrawLine.color('#E4A8A8');
        DrawLine.add((parseInt(1) * <?php echo ($assist['ntn']); ?> + <?php echo ($assist['ns']); ?> + 1), 2, <?php echo ($assist['ntn']); ?>, 0);
        DrawLine.color('#499495');
        DrawLine.add((parseInt(2) * <?php echo ($assist['ntn']); ?> + <?php echo ($assist['ns']); ?> + 1), 2, <?php echo ($assist['ntn']); ?>, 0);
        DrawLine.color('#E4A8A8');
        DrawLine.add((parseInt(3) * <?php echo ($assist['ntn']); ?> + <?php echo ($assist['ns']); ?> + 1), 2, <?php echo ($assist['ntn']); ?>, 0);
        DrawLine.color('#499495');
        DrawLine.add((parseInt(4) * <?php echo ($assist['ntn']); ?> + <?php echo ($assist['ns']); ?> + 1), 2, <?php echo ($assist['ntn']); ?>, 0);

        DrawLine.draw(Chart.ini.default_has_line);
        resize();
    }

    function resize() {
        // 20170508 patch to detect mobile device and not to bind the resize event
        var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
        if (!isMobile) {
            window.onresize = func;
            //document.onmousewheel = func;
            function func() {
                setTimeout(function() {
                        window.location.href = window.location.href
                    },
                    100);
            }
        }
    }

    //remove mousewheel event...totally, fix ie8 ..just find it and patch it...
    //remove remark after discuss the issue
    // document.onmousewheel = function(e){stopWheel(e);} /* IE7, IE8 */
    // if(document.addEventListener){ /* Chrome, Safari, Firefox */
    //  document.addEventListener('DOMMouseScroll', stopWheel, false);
    // }
    // function stopWheel(e){
    //  var event = e || window.event;
    //  if (event.ctrlKey) {
    //      if(!e){e = window.event;} /* IE7, IE8, Chrome, Safari */
    //      if(e.preventDefault) {e.preventDefault();} /* Chrome, Safari, Firefox */
    //      e.returnValue = false; /* IE7, IE8 */
    //  }
    // }
    var therm_handle = 0;
    var trends_handle = 0;
    var therm_handle = 0;

    function trends() {
        if (trends_handle == 0) {
            $("canvas").remove();
            $('.IELine').remove();
            trends_handle = 1;
        } else {
            drawLine();
            trends_handle = 0;
        }
    }

    function therm() {
        if (therm_handle == 0) {

            $("#chartsTable .ball0").removeClass("therm00");
            $("#chartsTable .ball1").removeClass("therm01");
            $("#chartsTable .ball2").removeClass('therm02');
            $(".ball0,.ball1,.ball2").addClass('ball01');
            therm_handle = 1;
        } else {
            $(".ball0,.ball1,.ball2").removeClass('ball01');
            $("#chartsTable .ball0").addClass("therm00");
            $("#chartsTable .ball1").addClass("therm01");
            $("#chartsTable .ball2").addClass('therm02');
            therm_handle = 0;

        }
    }

    function toggleMiss() {
        $('#missedTable').toggle();
    }
    //隐藏
    var t_handle = 0;
    function toggleNav(e) {
        $('.IELine').remove();
        if (t_handle == 0) {
            $("canvas").remove();
            $("#navbutton").html('展开功能区');
            $('#nav').fadeOut('fast',
                function() {
                    drawLine();
                });
            t_handle = 1;
            $("#symbol").removeClass('open');
            $("#symbol").addClass('close');
        } else {

            $("canvas").remove();

            $('#nav').fadeIn('fast',
                function() {
                    drawLine();
                });
            $("#navbutton").html('隐藏功能区');
            $("#symbol").removeClass('close');
            $("#symbol").addClass('open');
            t_handle = 0;

        }

    }
    var colored_handle = 0;
    function colored() {
        if (colored_handle == 0) {
            $("#chartsTable .lostcolor").css("background-color", '#FFF');
            colored_handle = 1;
        } else {
            $("#chartsTable .lostcolor").css("background-color", '#fef8ac');
            colored_handle = 0;
        }
    }
    var lostnum_handle = 0;
    function lostnum() {

        if (lostnum_handle == 0) {
            $("#chartsTable .lostnum").hide();
            lostnum_handle = 1;
        } else {
            $("#chartsTable .lostnum").show();
            lostnum_handle = 0;
        }
    }
    var assist_handle = 0;
    function assist() {
        if (assist_handle == 0) {
            $(".bottomtd").css("border-bottom", '');
            assist_handle = 1;
        } else {
            $(".bottomtd").css("border-bottom", "1px solid #ff0000");
            assist_handle = 0;
        }
    }
</script>
<style>
    esun\:*{behavior:url(#default#VML)}
</style>
<table width="100%" id="titlemessage" border="0" cellpadding="0" cellspacing="0">
    <!--走势图表头开始-->
    <tr>
        <td bgcolor="#d6d6d6" colspan="6" style="text-align:left">
            <b>
                <span onclick="toggleNav(event);" style="display:none;" id='navbutton'>
                    隐藏功能区
                </span>
            </b>
            <b>
                <span id='symbol' class="open" style="display:none;" onclick="toggleNav(event);">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
            </b>
        </td>
    </tr>
    <tr>
        <td bgcolor="#d6d6d6" colspan="6" style="text-align:left;vertical-align:middel;width:100%;height:30%">
            <div id='nav'>
                <div style="width:auto;float:left">
                            <span title="选中时（用鼠标单击控件打上勾即为选中），在表格中每5个奖期的号码栏中将会出现辅助线" style="cursor:pointer">
                                <input type='checkbox' onclick='assist()' checked="checked" />
                                辅助线
                            </span>
                    <span title="选中时（用鼠标单击控件打上勾即为选中），在表格中每期开奖号码的表格中显示出该号码的遗漏值。" style="cursor:pointer">
                                <input type='checkbox' checked="checked" onclick='lostnum()' />
                                遗漏
                            </span>
                    <span title="选中时（用鼠标单击控件打上勾即为选中），在表格中将会把遗漏期使用有色的柱图来表示。" style="cursor:pointer">
                                <input type='checkbox' checked="checked" onclick='colored()' />
                                遗漏条
                            </span>
                    <span title="选中时（用鼠标单击控件打上勾即为选中），将会在表格中绘制开奖号码的走势。" style="cursor:pointer">
                                <input type='checkbox' checked="checked" onclick='trends()' />
                                走势
                            </span>
                    <span title="选中时（用鼠标单击控件打上勾即为选中），色温分为“冷热温”三种色调" style="cursor:pointer">
                                <input type='checkbox' onclick='therm()' checked="checked" />
                                号温
                            </span>
                    <span>
                        <?php  if($issuecount ==30) { echo '最近30期&nbsp;'; }else{ echo "<a href=".U('/newgame_trend_hjlf?type='.$type.'&issuecount=30&mod=top_three&type_name='.$type_name).">最近30期&nbsp;</a>"; } ?>
                    </span>
                    <span>
                        <?php  if($issuecount ==50) { echo '最近50期&nbsp;'; }else{ echo "<a href=".U('/newgame_trend_hjlf?type='.$type.'&issuecount=50&mod=top_three&type_name='.$type_name).">最近50期&nbsp;</a>"; } ?>
                        </span>
                    <span>
                         <?php  if($issuecount ==100) { echo '最近100期&nbsp;'; }else{ echo "<a href=".U('/newgame_trend_hjlf?type='.$type.'&issuecount=100&mod=top_three&type_name='.$type_name).">最近100期&nbsp;</a>"; } ?>
                            </span>
                    <span>
                        <?php  if($issuecount ==300) { echo '最近300期&nbsp;'; }else{ echo "<a href=".U('/newgame_trend_hjlf?type='.$type.'&issuecount=300&mod=top_three&type_name='.$type_name).">最近300期&nbsp;</a>"; } ?>
                            </span>
                </div>
            </div>
        </td>
    </tr>
    <!--走势图表头结束-->
    <tr>
        <td bgcolor="#045750" class="date_links">
        </td>
        <td bgcolor="#045750">
        </td>
    </tr>
</table>
<div style="position:relative; height: 950px;" id="container">
    <table id="chartsTable" width="100%" cellpadding="0" cellspacing="0" style="position:absolute; top:0; left:0;"
           class="chart-table">
        <tr>
            <td bgcolor="#045750" rowspan="2">
                <strong style="color: #FFFFFF">
                    期号
                </strong>
            </td>
            <td bgcolor="#045750" rowspan="2" colspan="<?php echo ($assist['ns']); ?>" style="border-right:#FFFFFF solid 1px;"
                class="redtext">
                <strong style="color: #FFFFFF">
                    开奖号码
                </strong>
            </td>
            <td bgcolor="#045750" style="border-right:#FFFFFF solid 1px;" colspan="<?php echo ($assist['ntn']-1); ?>">
                <strong style="color: #FFFFFF">
                    龙
                </strong>
            </td>
            <td bgcolor="#045750" style="border-right:#FFFFFF solid 1px;" colspan="<?php echo ($assist['ntn']-1); ?>">
                <strong style="color: #FFFFFF">
                    凤
                </strong>
            </td>
            <td bgcolor="#045750" colspan="<?php echo ($assist['ntn']); ?>">
                <strong style="color: #FFFFFF">
                    号码分布
                </strong>
            </td>
        </tr>
        <tr id="head">
            <?php
 for ($i = 0; $i < $assist['ns']+1; $i++) { for ($ii = $assist['ntx']; $ii <= $assist['ntd']; $ii++) { if($ii == $assist['ntd'] && $i < 5){ echo "<td bgcolor='#045750' style='border-right:#FFFFFF solid 1px; color: #FFFFFF;'>$ii</td>"; }else{ echo "<td bgcolor='#045750' class='wdh' style='color: #FFFFFF'>$ii</td>"; } } } ?>
        </tr>
        <!--循环开奖数据-->
        <?php
 $hotBall = []; $weiBall = []; for ($i = 0; $i <= $assist['nts']; $i++) { $s[$i] = 0; $a[$i] = 0; $b[$i] = 0; $c[$i] = 0; $d[$i] = 0; } foreach ($rs as $key => $row) { $bottm = ($key+1)%5 == 0 ? "bottomtd" : ""; $na = array(); $na2 = array(); $na2 = explode(',', $row['data']); $na[1] = $na2[0]; for ($i = 0; $i <= $assist['nts']; $i++) { $a[$i] = $a[$i] + 1; $c[$i] = $c[$i] + 1; if ($b[$i] < $a[$i]) { $b[$i] = $a[$i]; } if ($d[$i] < $c[$i]) { $d[$i] = $c[$i]; } } ?>
        <tr>
            <td class='<?php echo ($bottm); ?> title'>
                <?php echo ($row['number']); ?>
            </td>
            <td class="wdh <?php echo ($bottm); ?>" align="center" style="">
                <div class="">
                    <?php echo ($na[1]); ?>
                </div>
            </td>
            
            <?php
 $iii = 0; for ($i = 0; $i < $assist['ns']+1; $i++) { for ($ii = $assist['ntx']; $ii <= $assist['ntd']; $ii++) { $tii = $assist['ntx'] == 1 ? $ii-1: $ii; $iii = $iii + 1; $weiBall[$i][$tii] = isset($weiBall[$i][$tii]) ? $weiBall[$i][$tii] : 0; if($i < $assist['ns']){ if ($na[$i + 1] == $ii) { if($ii == $assist['ntd']){ echo "<td class='charball $bottm' style='border-right:#cccccc solid 1px;' align='center'><div isball='".$i."-".$tii."' class='ball1 ball01'>" . $na[$i + 1] . '</div>'; }else{ echo "<td class='charball $bottm'  align='center'><div isball='".$i."-".$tii."' class='ball1 ball01'>" . $na[$i + 1] . '</div>'; } $a[$iii] = 0; $s[$iii] = $s[$iii] + 1; $weiBall[$i][$tii] = $weiBall[$i][$tii] +1 ; } else { if($ii == $assist['ntd']){ echo "<td lostBall='".$iii."' class='wdh $bottm' style='border-right:#cccccc solid 1px;' align='center'><div class='lostdiv'><div class='lostnum'>" . $a[$iii] . '</div></div>'; }else{ echo "<td lostBall='".$iii."' class='wdh $bottm' align='center'><div class='lostdiv'><div class='lostnum'>" . $a[$iii] . '</div></div>'; } $c[$iii] = 0; } }else{ $strCount = substr_count($row['data'],$ii); if(in_array($type,$sscConfig)){ $str_count = array_count_values(explode(',',$row['data'])); $tii = $ii; if($tii < 10){ $tii='0'.$tii; } $strCount = empty($str_count[$tii]) ? 0 : $str_count[$tii]; } if($strCount == 1){ echo "<td class='wdh $bottm' align='center'><div class='ball06'>" . $ii . '</div>'; $a[$iii] = 0; $s[$iii] = $s[$iii] + $strCount; }elseif($strCount > 1){ echo "<td class='wdh $bottm' align='center'><div class='ball05'>" . $ii . '</div>'; $a[$iii] = 0; $s[$iii] = $s[$iii] + $strCount; }else{ echo "<td class='wdh $bottm' align='center'><div class='lostdiv'>" . $a[$iii] . '</div>'; $c[$iii] = 0; } } ?>
        </td>
            <?php  } } ?>
        </tr>
        <?php } ?>


        <tr>
            <td bgcolor="#045750" style="color:#FFFFFF;" nowrap>
                出现总次数
            </td>
            <td bgcolor="#045750" align="center" style="border-right:#FFFFFF solid 1px;"
                colspan="<?php echo ($assist['ns']); ?>">
                &nbsp;
            </td>

            <?php
 $sis = 1; for ($i = 0; $i < $assist['ns']+1; $i++) { for ($ii = $assist['ntx']; $ii <= $assist['ntd']; $ii++) { $hotBall[] = $s[$sis]; if($ii == $assist['ntd'] && $i < 5){ echo "<td bgcolor='#045750' align='center' style='border-right:#FFFFFF solid 1px;color:#FFFFFF;'>".$s[$sis]."</td>"; }else{ echo "<td bgcolor='#045750' style='color:#FFFFFF;' align='center'>".$s[$sis]."</td>"; } $sis++; } } ?>
        </tr>
        <tr>
            <td bgcolor="#045750" style="color:#FFFFFF;" nowrap>
                平均遗漏值
            </td>
            <td bgcolor="#045750" align="center" style="border-right:#FFFFFF solid 1px;"
                colspan="<?php echo ($assist['ns']); ?>">
                &nbsp;
            </td>
            
            <?php
 $sis = 1; for ($i = 0; $i < $assist['ns']+1; $i++) { for ($ii = $assist['ntx']; $ii <= $assist['ntd']; $ii++) { if ($s[$sis] == 0) { $av = $total; } else { $av = intval($total / $s[$sis]); } if($ii == $assist['ntd'] && $i < 5){ echo "<td bgcolor='#045750' align='center' style='border-right: #FFFFFF 1px solid;color:#FFFFFF;'>".$av."</td>"; }else{ echo "<td bgcolor='#045750' style='color:#FFFFFF;' align='center'>" . $av . "</td>"; } $sis++; } } ?>
        </tr>
        <tr>
            <td bgcolor="#045750" style='color:#FFFFFF;'  nowrap>
                最大遗漏值
            </td>
            <td bgcolor="#045750" align="center" style="border-right:#FFFFFF solid 1px;"
                colspan="<?php echo ($assist['ns']); ?>">
                &nbsp;
            </td>
            <?php
 $sis = 1; for ($i = 0; $i < $assist['ns']+1; $i++) { for ($ii = $assist['ntx']; $ii <= $assist['ntd']; $ii++) { if ($b[$sis] - 1 < $a[$sis]) { $bv = $a[$sis]; } else { $bv = $b[$sis] - 1; } if($ii == $assist['ntd'] && $i < 5){ echo "<td bgcolor='#045750' align='center' style='border-right: #FFFFFF 1px solid;color:#FFFFFF;'>".$bv."</td>"; }else{ echo "<td bgcolor='#045750' style='color:#FFFFFF;' align='center'>" . $bv . "</td>"; } $sis++; } } ?>
        </tr>
        <tr>
            <td bgcolor="#045750" style='color:#FFFFFF;'  nowrap>
                最大连出值
            </td>
            <td bgcolor="#045750" align="center" style="border-right:#FFFFFF solid 1px;color:#FFFFFF;"
                colspan="<?php echo ($assist['ns']); ?>">
                &nbsp;
            </td>
            <?php
 $sis = 1; for ($i = 0; $i < $assist['ns']+1; $i++) { for ($ii = $assist['ntx']; $ii <= $assist['ntd']; $ii++) { if ($d[$sis] - 1 < $c[$sis]) { $dv = $c[$sis]; } else { $dv = $d[$sis] - 1; } if($ii == $assist['ntd'] && $i < 5){ echo "<td bgcolor='#045750' align='center' style='border-right: #FFFFFF 1px solid; color:#FFFFFF;'>".$dv."</td>"; }else{ echo "<td bgcolor='#045750' style='color:#FFFFFF;' align='center'>" . $dv . "</td>"; } $sis++; } } ?>
        </tr>
        <?php
 echo '<script>'; echo 'var hotBall = '.json_encode($hotBall).';'; echo 'var weiBall = '.json_encode($weiBall).';'; echo 'var louBall = '.json_encode($a).';'; echo '</script>'; ?>
    <tr>
    <td rowspan="2" bgcolor="#045750">
        <strong style="color:#FFFFFF;">
        期号
        </strong>
        </td>
        <td rowspan="2" colspan="<?php echo ($assist['ns']); ?>" style="border-right:#FFFFFF solid 1px; color:#FFFFFF;" bgcolor="#045750">
    <strong>
    开奖号码
    </strong>
    </td>

    <?php
 for ($i = 0; $i < $assist['ns']+1; $i++) { for ($ii = $assist['ntx']; $ii <= $assist['ntd']; $ii++) { if($ii == $assist['ntd'] && $i < 5){ echo "<td bgcolor='#045750' style='border-right:#FFFFFF solid 1px; color:#FFFFFF;'><strong>$ii</strong></td>"; }else{ echo "<td bgcolor='#045750' style='color:#FFFFFF;' class='wdh'><strong>$ii</strong></td>"; } } } ?>
    </tr>
    <tr>
    <td bgcolor="#045750" style="border-right:#FFFFFF solid 1px;" colspan="<?php echo ($assist['ntn']); ?>">
            <strong style="color: #FFFFFF">
        龙凤
        </strong>
        </td>
    <td colspan="<?php echo ($assist['ntn']); ?>" bgcolor="#045750" style=" color:#FFFFFF;">
        <strong>
        号码分布
        </strong>
        </td>
        </tr>
        <tr>
        <td colspan="<?php echo ($assist['nts']); ?>" style='text-align:left'>
        <div id='refdiv'>
        <p>
        参数说明：
    </p>
    <p>
    龙（0） 凤（1）对应的走势。
    </p>
    </div>
    </td>
    </tr>
    </table>
    </div>
    </body>
    </html>