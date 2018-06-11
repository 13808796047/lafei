<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="renderer" content="webkit">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>首页－<?php echo S('WEB_NAME');?></title>
    <link href="/Public/Home/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/Home/css/nifty.min.css" rel="stylesheet">
    <link href="/Public/Home/css/bootstrap-tour.min.css" rel="stylesheet">
    <link href="/Public/Home/css/font-awesome.min.css" rel="stylesheet">
    <link href="/Public/Home/css/css.min.css" rel="stylesheet">
    <link href="/Public/Home/css/index.min.css" rel="stylesheet">

    <style>
    body,
    html {
        overflow: hidden;
    }
    </style>
    <link id='theme' rel='stylesheet' />
</head>
<div id="container" class="effect mainnav-fixed navbar-fixed footer-fixed mainnav-lg">
    <header id="navbar">
        <div id="navbar-container">
            <div class="navbar-header">
                <a class="navbar-brand" href="javascript:;">
                    <img alt="Logo" class="brand-icon" src="/Public/Home/images/frame/logo.png">
                    <div class="brand-title">
                        <span class="brand-text"></span>
                    </div>
                </a>
            </div>
            <div class="navbar-content clearfix">
                <a class="mainnav-toggle" href="javascript:;"><i></i></a>
                <ul class="nav navbar-top-links pull-left">
                    <!--<li class="dropdown" id="user_message">
                        <a class="mega-dropdown-toggle" href="<?php echo ($settings["kefuGG"]); ?>" target="_blank">
                            <i class="fa fa-user fa-lg" style="color: #79bcff;"></i><em>客服</em>

                        </a>
                    </li>-->
                    <li class="dropdown" id="user_notice">
                        <a id="fastdata-notice-href" class="dropdown-toggle" href="<?php echo U('notice/index');?>" target="pageframe">
                            <i class="fa fa-bell fa-lg" style="color: #ffb230;"></i><em>公告</em>
                            <span class="badge badge-header badge-danger" id="user_noticecount" style="display:none; top:0px;">0</span>
                        </a>
                    </li>
                    <li class="mega-dropdown" id="user_main_menu">
                        <a class="mega-dropdown-toggle" href="#">
                            <i class="fa fa-th-large fa-lg" style="color: #ed6c44;"></i><em>菜单</em>
                        </a>
                        <div class="dropdown-menu mega-dropdown-menu">
                            <div class="clearfix">
                                <div class="col-sm-12 col-md-3">
                                    <div class="text-center czbg pad-all">
                                        <a href="javascript:$.niftyNoty({type: 'danger',icon: 'fa fa-minus',message: '请联系在线客服',container: 'floating',timer: 3000});">
                                        提交意见
                                </a>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-3" id="menu_member">
                                    <ul class="list-unstyled">
                                        <li class="dropdown-header"><img alt="" src="/Public/Home/images/frame/11.png">会员中心</li>
                                        <li>
                                            <a href="<?php echo U('user/info');?>" target="pageframe">
                                            用户中心
                                <span class="pull-right label label-danger">
                                                New
                                </span>
                                </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo U('user/password');?>" target="pageframe">
                                                <span class="pull-right label label-danger">
                                                    Hot
                                    </span>修改密码
                                            </a>
                                        </li>
                                        <li><a href="<?php echo U('user/bank');?>" target="pageframe">银行资料</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-4 col-md-3" id="menu_proxy">
                                    <ul class="list-unstyled">
                                        <li class="dropdown-header"><img alt="" src="/Public/Home/images/frame/12.png">代理中心</li>
                                        <li><a href="<?php echo U('team/member');?>" target="pageframe"><span class="pull-right label label-danger">Hot</span>会员管理</a></li>
                                        <!--<li><a href="<?php echo U('team/linklist');?>" target="pageframe" id="autoreg">自动注册</a></li>-->
                                        <li><a href="<?php echo U('team/report');?>" target="pageframe">盈亏报表</a></li>
                                        <li><a href="<?php echo U('team/record');?>" target="pageframe">投注记录</a></li>
                                        <li><a href="<?php echo U('team/coin');?>" target="pageframe">账变明细</a></li>
                                        <li><a href="<?php echo U('team/rechargerecord');?>" target="pageframe">充值记录</a></li>
                                        <li><a href="<?php echo U('team/cashrecord');?>" target="pageframe">提现记录</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-4 col-md-3">
                                    <ul class="list-unstyled">
                                        <li class="dropdown-header"><img alt="" src="/Public/Home/images/frame/13.png">服务中心</li>
                                        <li>
                                            <a href="<?php echo U('activity/xieyi');?>" target="pageframe">
                                                <span class="pull-right badge badge-success"></span>投注协议
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo U('activity/xiaofei');?>" target="pageframe">
                                                <span class="pull-right badge badge-success"></span>最新活动
                                            </a>
                                        </li>
                                        <li><a href="<?php echo U('notice/index');?>" target="pageframe">通知公告</a></li>
                                        <li class="divider"></li>
                                        <li class="dropdown-header"><img alt="" src="/Public/Home/images/frame/14.png">资金中心</li>
                                        <li>
                                            <a href="<?php echo U('recharge/index');?>" target="pageframe">
                                                <span class="pull-right badge badge-purple">
                                                秒到
                                </span> 我要充值
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo U('cash/index');?>" target="pageframe">
                                                <span class="pull-right badge badge-purple">
                                                秒到
                                </span>我要提现
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <span id="user-span"><ul class="nav navbar-top-links pull-right">
    <li id="dropdown-user" class="yue">
        <a href="<?php echo U('activity/xiaofei');?>" target="pageframe" style="cursor:pointer;">
            <span class="glyphicon glyphicon-fire" style="color: #ffb230;" aria-hidden="true"></span> 优惠活动
        </a>
    </li>
    <li id="dropdown-user" class="yue">
        <a href="<?php echo U('user/help');?>" target="pageframe" style="cursor:pointer;">
            <span class="glyphicon glyphicon-question-sign" style="color:  #ec3e08;" aria-hidden="true"></span> 帮助中心
        </a>
    </li>
    <li id="dropdown-user" class="yue">
        <a href="<?php echo U('user/info');?>" target="pageframe" style="cursor:pointer;">
            <img alt="" src="/Public/Home/images/frame/tx.png"><span id="user_nickname" style="color:#515151;"><?php echo ($user['username']); ?></span>
        </a>
    </li>
    <li class="jifen"><img alt="" src="/Public/Home/images/frame/10.png">余额：<span id="user_sscmoney" style="color:red;"><?=number_format($user['coin'],2)?></span>元<span id="j-refresh" class="fa fa-refresh" action="<?php echo U('index/userinfo');?>" style="cursor:pointer;"></span></li>
    <li>
        <a id="j-sign-out" href="javascript:;" style="display:block;" action="<?php echo U('user/logout');?>"><i class="fa fa-power-off"></i>退出</a>
    </li>
</ul>
</span>
            </div>
        </div>
    </header>
    <div class="boxed">
        <div id="content-container" style="padding-bottom: 0">
            <div id="page-content" style="padding: 0; margin: 0">
                <iframe id="pageframe" name="pageframe" src="<?php echo U('index/main');?>" style="width: 100%; height: 889px;" allowtransparency="true" frameborder="0">
                </iframe>
            </div>
        </div>
        <nav id="mainnav-container">
            <div id="mainnav">
                <div id="mainnav-shortcut" class="mainnav-widget">
                    <ul class="list-unstyled newmenu">
                        <li title="" data-original-title="" class="col-xs-6">
                            <a class="shortcut-grid" href="<?php echo U('recharge/index');?>" target="pageframe">
                                <img alt="" src="/Public/Home/images/frame/c.png"><strong>充值</strong>
                            </a>
                        </li>
                        <li title="" data-original-title="" class="col-xs-6">
                            <a class="shortcut-grid" href="<?php echo U('cash/index');?>" target="pageframe">
                                <img alt="" src="/Public/Home/images/frame/t.png"><strong>提现</strong>
                            </a>
                        </li>
                    </ul>
                </div>
                <div id="mainnav-menu-wrap">
                    <div class="nano has-scrollbar">
                        <div style="right: -17px;" tabindex="0" class="nano-content">
                            <ul id="mainnav-menu" class="list-group">
                                <li class="list-header">导航</li>
                                <li class="active-link">
                                    <a class="" title="" data-original-title="" href="<?php echo U('index/main');?>" target="pageframe">
                                        <img alt="" src="/Public/Home/images/frame/0.png">
                                        <span class="menu-title">
                            <strong>首页</strong>
                            </span>
                                    </a>
                                </li>
                                <li class="list-divider"></li>
                                <li class="list-header">游戏列表</li>
                                <li class="active">
                                    <a class="" title="" data-original-title="" href="#">
                                        <img alt="" src="/Public/Home/images/frame/1.png">
                                        <span class="menu-title">时时彩</span>
                                        <i class="arrow"></i>
                                    </a>
                                    <ul aria-expanded="true" class="pop-in collapse in">
                                        <li><a href="<?php echo U('game/game?type=46&groupId=75');?>" target="pageframe" id="ccssc">银河龙凤<span class="pull-right badge badge-danger">热</span></a></li>
                                        <li><a href="<?php echo U('game/game?type=1&groupId=6');?>" target="pageframe" id="ccssc">重庆时时彩<span class="pull-right badge badge-danger">热</span></a></li>
                                        <!--<li><a href="<?php echo U('game/game?type=3&groupId=6');?>" target="pageframe" id="tjssc">天津时时彩<span class="pull-right badge badge-success">官方</span></a></li>-->
                                        <!--<li><a href="<?php echo U('game/game?type=12&groupId=6');?>" target="pageframe" id="xjssc">新疆时时彩<span class="pull-right badge badge-success">新</span></a></li>-->
                                        <!--<li><a href="<?php echo U('game/game?type=41&groupId=6');?>" target="pageframe">加拿大3.5分彩<span class="pull-right badge badge-success">新</span></a></li>-->
                                        <!--<li><a href="<?php echo U('game/game?type=42&groupId=6');?>" target="pageframe">台湾5分彩<span class="pull-right badge badge-success">官方</span></a></li>-->
                                        <li><a href="<?php echo U('game/game?type=43&groupId=6');?>" target="pageframe" id="mmc">腾讯分分彩<span class="pull-right badge badge-success">荐</span></a></li>
                                        <!--<li><a href="<?php echo U('game/game?type=37&groupId=6');?>" target="pageframe">东京1.5分彩<span class="pull-right badge badge-danger">热</span></a></li>-->
                                        <li><a href="<?php echo U('game/game?type=40&groupId=6');?>" target="pageframe">新德里1.5分彩<span class="pull-right badge badge-success">新</span></a></li>
                                        <!--<li><a href="<?php echo U('game/game?type=35&groupId=6');?>" target="pageframe">韩国1.5分彩<span class="pull-right badge badge-success">新</span></a></li>-->
                                        <li><a href="<?php echo U('game/game?type=36&groupId=6');?>" target="pageframe" id="mmc">秒秒彩<span class="pull-right badge badge-danger">热</span></a></li>
                                        <li><a href="<?php echo U('game/game?type=5&groupId=6');?>" target="pageframe" id="ffc">分分彩<span class="pull-right badge badge-success">新</span></a></li>
                                        <li><a href="<?php echo U('game/game?type=34&groupId=6');?>" target="pageframe" id="efc">河内二分彩<span class="pull-right badge badge-success">新</span></a></li>
                                        <li><a href="<?php echo U('game/game?type=14&groupId=6');?>" target="pageframe" id="wfc">台湾五分彩<span class="pull-right badge badge-success">新</span></a></li>
                                        <!-- <li><a href="<?php echo U('game/game?type=35&groupId=6');?>" target="pageframe">韩国1.5分彩<span class="pull-right badge badge-success">新</span></a></li> -->
                                    </ul>
                                </li>
                                <!-- <li>
    <a class="" title="" data-original-title="" href="#">
        <img alt="" src="/Public/Home/images/frame/2.png">
        <span class="menu-title">1.5分彩</span>
        <i class="arrow"></i>
    </a>
    <ul class="collapse pop-in">
    </ul>
</li>
 -->
                                <li>
                                    <a class="" title="" data-original-title="" href="#">
                                        <img alt="" src="/Public/Home/images/frame/2.png">
                                        <span class="menu-title">11选5</span>
                                        <i class="arrow"></i>
                                    </a>
                                    <ul class="collapse pop-in">
                                        <li><a href="<?php echo U('game/game?type=38&groupId=10');?>" target="pageframe">30秒11选5<span class="pull-right badge badge-success">新</span></a></li>
                                        <li><a href="<?php echo U('game/game?type=39&groupId=10');?>" target="pageframe">一分钟11选5<span class="pull-right badge badge-danger">热</span></a></li>
                                        <li><a href="<?php echo U('game/game?type=6&groupId=10');?>" target="pageframe">广东11选5<span class="pull-right badge badge-danger">热</span></a></li>
                                        <li><a href="<?php echo U('game/game?type=16&groupId=10');?>" target="pageframe">江西11选5<span class="pull-right badge badge-success">官方</span></a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="" title="" data-original-title="" href="#">
                                        <img alt="" src="/Public/Home/images/frame/3.png">
                                        <span class="menu-title">快乐彩</span>
                                        <i class="arrow"></i>
                                    </a>
                                    <ul class="collapse pop-in">
                                        <li><a href="<?php echo U('game/game?type=24&groupId=38');?>" target="pageframe">北京快乐8<span class="pull-right badge badge-success">官方</span></a></li>
                                        <li><a href="<?php echo U('game/game?type=20&groupId=26');?>" target="pageframe">北京PK10<span class="pull-right badge badge-success">官方</span></a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="" title="" data-original-title="" href="#">
                                        <img alt="" src="/Public/Home/images/frame/4.png">
                                        <span class="menu-title">数字三</span><i class="arrow"></i>
                                    </a>
                                    <ul class="collapse pop-in">
                                        <li><a href="<?php echo U('game/game?type=25&groupId=44');?>" target="pageframe">江苏快三<span class="pull-right badge badge-danger">热</span></a></li>
                                        <li><a href="<?php echo U('game/game?type=9&groupId=12');?>" target="pageframe">福彩3D<span class="pull-right badge badge-danger">热</span></a></li>
                                        <li><a href="<?php echo U('game/game?type=10&groupId=12');?>" target="pageframe">排列三<span class="pull-right badge badge-success">新</span></a></li>
                                    </ul>
                                </li>
                                <li class="list-divider"></li>
                                <li class="list-header">服务中心</li>
                                <li>
                                    <a class="" title="" data-original-title="" href="<?php echo U('activity/xiaofei');?>" target="pageframe">
                                        <img alt="" src="/Public/Home/images/frame/5.png">
                                        <span class="menu-title">
                                    优惠活动
                            <span class="label label-mint pull-right">荐</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="" title="" data-original-title="" href="javascript:$.niftyNoty({type: 'danger',icon: 'fa fa-minus',message: '请联系在线客服',container: 'floating',timer: 3000});">
                                        <img alt="" src="/Public/Home/images/frame/tousu1.png">
                                        <span class="menu-title">投诉建议</span>
                                    </a>
                                </li>
                                <!--<li id="kefulink">
                                    <a class="" title="" data-original-title="" href="<?php echo ($settings["kefuGG"]); ?>" target="_blank">
                                        <img alt="" src="/Public/Home/images/frame/7.png">
                                        <span class="menu-title">在线客服</span><span class="pull-right badge badge-danger" style="display:none" id="j-kf-count">0</span>
                                    </a>
                                </li>-->
                                <li class="list-divider"></li>
                            </ul>
                        </div>
                        <div style="display: none;" class="nano-pane">
                            <div style="height: 20px; transform: translate(0px, 0px);" class="nano-slider">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<div class="sidemsg" id="chat_main">
    <div class="sidetitle">
        <img alt="" src="">会员昵称
        <span>
        <a href="javascript:void(0)" class="minimask" id="chat_mini">
        <img alt="" src="frame.html" title="最小化在线客服">
        </a>
        <a href="javascript:void(0)" class="closemask" id="chat_exit">
        <img alt="" src="" title="关闭在线客服">
        </a>
        </span>
    </div>
    <div class="sidemsgbox">
        <div class="sidemsgboxleft">
            <div class="kefubox">
                <div style="padding:5px; padding-bottom:0;margin:0" class="chathead">
                    <div class="input-group mar-btm cz">
                        <input placeholder="查找联系人" class="form-control" id="memberNameChat" type="text">
                        <i class="fa fa-search" id="queryMemberChat"></i>
                    </div>
                </div>
                <div class="kefuboxcontent" id="kefu_list">
                    <div class="list-group bg-trans renlist" id="renlist">
                        <h4 class="pad-hor text-thin">在线客服</h4>
                        <div class="list-group bg-trans">
                            <a href="javascript:;" class="list-group-item" mark="" nick="" mode="customservice" id="customservice">
                                <div class="media-left">
                                    <img class="img-circle img-xs" src="/Public/Home/images/frame/av4.png" alt="Profile Picture">
                                </div>
                                <div class="media-body">
                                    <div class="text-lg">
                                        在线客服
                                    </div>
                                </div>
                            </a>
                            <a href="javascript:;" class="list-group-item" mark="xiaomi520" nick="上级" mode="superior" id="superior">
                                <div class="media-left">
                                    <img class="img-circle img-xs" src="" alt="Profile Picture" id="imgSupState">
                                </div>
                                <div class="media-body">
                                    <div class="text-lg">
                                        上级
                                    </div>
                                    <span class="text-danger text-bold" id="onlineSupState">在线状态</span>
                                    <span class="pull-right badge badge-danger" style="display:none;" id="sup_chat_num"></span>
                                </div>
                            </a>
                        </div>
                        <h4 class="pad-hor text-thin">
                        <span class="pull-right badge badge-mint" id="online_member_count">0</span>在线下级
                        </h4>
                        <div class="list-group bg-trans" id="online_members">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidemsgboxright">
            <div id="chat-body">
                <div class="chattitle backkefubox">
                    <span id="chatTitle">在  线  客  服</span>
                </div>
                <div id="chatlist">
                    <div class="chatbox" id="chatbox_customservice" style="display:none;">
                    </div>
                </div>
                <div class="panel-footer" id="chatSend" style="padding:0; visibility:hidden;">
                    <div class="chatfooter">
                        <i class="att" id="uploadfile"></i>
                        <input id="txtContent" maxlength="500" placeholder="请输入消息内容" type="text">
                        <button class="btn btn-primary sendbtn" type="button" id="sendcontent" onclick="sendContent('');">发送消息</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="onlineservice">
    <label id="j-kf-msg-count" style="display:none;">0</label>
    <input class="onlineservicebtn" value="" title="拖拽可移动位置，双击可显示在线客服" type="button">
</div>
<div id="j-play" style="display: none; width: 0px; height: 0px;">
    <img style="width: 0px; height: 0px; display: none;" id="jp_poster_0">
    <audio src="/Public/Home/images/frame/5097.mp3" preload="metadata" id="jp_audio_0"></audio>
</div>
<input name="file" id="file" style="display:none;" type="file">
<input value="xiaomi520" id="hdMemberName" type="hidden">
<input value="1" id="hdMemberType" type="hidden">

<script src="/Public/Home/js/jquery.min.js"></script>

<script src="/Public/Home/js/bootstrap.min.js"></script>

<script src="/Public/Home/js/nifty.min.js"></script>
<script src="/Public/Home/js/common.min.js"></script>
<script src="/Public/Home/js/fastdata.js"></script>
<script src="/Public/Home/js/jquery.jplayer.min.js"></script>
<script src="/Public/Home/js/layout.min.js"></script>
<script src="/Public/Home/js/layer/layer.js"></script>

<script language="javascript" type="text/javascript" src="/nitalk/js/fonts.js?modidate=20160317003"></script>
<script language="javascript" type="text/javascript" src="/nitalk/js/bundle.js?modidate=20160317003"></script>
<script language="javascript" type="text/javascript">
if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    nitalk();
    configtalk('<?php echo $user["username"];?>', '<?php echo md5($user['
        password ']);?>', 'http://<?php echo $_SERVER['
        SERVER_NAME '];?>/nitalk/', 'newbee', '<?php echo S('
        WEB_NAME ');?>', '<?php echo U('
        team / linkList ');?>', '');
    $(document).ready(function() {
        inittalk();
    });
}
if( localStorage.layerIdex === undefined) localStorage.layerIdex = 1;
</script>
<script type="text/javascript">
$(document).ready(function() {
    if(localStorage.layerIdex < 2){
        layer.open({
            type: 2,
            title: '系统提示',
            shadeClose: true,
            shade: 0.8,
            maxmin: true, //开启最大化最小化按钮
            area: ['893px', '600px'],
            content: '/index.php?s=/home/notice/lastinfo.html'
        });
        localStorage.layerIdex = 2;
    }

    $(".mega-dropdown a[target='pageframe']").unbind("click").on("click", function() {
        $('.mega-dropdown').removeClass('open');
    });
});
</script>
<script>
$(document).ready(function() {
    var bodyheight = jQuery(window).height() - 54;
    $("#pageframe").css("height", bodyheight);
    $(".mainnav-toggle").click(
        function toggle() {
            $(this).toggleClass("mainnav-toggle2")
            $(".brand-icon").toggleClass("brand-icon2")
            $(".newmenu").toggleClass("newmenu2")
        }
    );
    $('a[target=pageframe]').each(function() {
        $(this).bind('click', function() {
            var $this = $(this);
            localStorage.ifarmeSrc = $this.attr('href');
        });
    });
    if (!!localStorage.ifarmeSrc && localStorage.ifarmeSrc != 'undefined') {
        $("#pageframe")[0].src = localStorage.ifarmeSrc;
    }

});
$(window).resize(function() {
    var bodyheight = jQuery(window).height() - 54;
    $("#pageframe").css("height", bodyheight);
})

/*setInterval(function () {
    $.ajax({
        type: "GET",
        url: "<?php echo U('user/logoutUser');?>",
        data: {},
        dataType: "json",
        global: false,
        success: function(result) {
            if (result['isOnLine'] == 1){
                window.location.reload();
            }
        },
        error: function() {}
    });
},1000);*/
</script>
<!-- Start of LiveChat (www.livechatinc.com) code -->
<script type="text/javascript">
    window.__lc = window.__lc || {};
    window.__lc.license = 9666350;
    (function() {
        var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
        lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
    })();
</script>
<!-- End of LiveChat code -->