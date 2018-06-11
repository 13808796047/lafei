<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<META name="renderer" content="webkit">
<META charset="utf-8">
<META http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<META name="viewport" content="width=device-width, initial-scale=1.0">
<title>用户中心－<?php echo S('WEB_NAME');?></title>

<link href="/Public/Home/css/bootstrap.min.css" rel="stylesheet">
<link href="/Public/Home/css/bootstrap-slider.all.css" rel="stylesheet">

<link href="/Public/Home/css/nifty.min.css" rel="stylesheet">
<link href="/Public/Home/css/font-awesome.min.css" rel="stylesheet">
<link href="/Public/Home/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<link href="/Public/Home/css/switchery.min.css" rel="stylesheet">
<link href="/Public/Home/css/css.min.css" rel="stylesheet">
<link href="/Public/Home/css/withdraw.css" rel="stylesheet">
<link href="/Public/Home/css/comm.min.css" rel="stylesheet">
<link href="/Public/Home/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="/Public/Home/css/dataTables.responsive.min.css" rel="stylesheet">
<link rel="stylesheet" href="/Public/Home/css/select2.min.css">
<meta name="GENERATOR" content="MSHTML 11.00.9600.16428">

<!-- IE浏览器时需要以下js支持 -->

<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<?php echo hook('pageHeader');?>

	
	<!-- /头部 -->
	

    <!--<script src="/Public/Home/js/jquery.min.js"></script>-->
    <script src="/Public/Home/js/jquery.min.js"></script>

    <script src="/Public/Home/js/bootstrap.min.js"></script>


    <script src="/Public/Home/js/bootstrap-datetimepicker.min.js"></script>
    <script src="/Public/Home/js/bootstrap-datetimepicker.zh-CN.min.js"></script>
    <script src="/Public/Home/js/nifty.min.js"></script>
    <script src="/Public/Home/js/switchery.min.js"></script>
    <script src="/Public/Home/js/md5.min.js"></script>
    <script src="/Public/Home/js/common.min.js"></script>
    <script src="/Public/Home/js/dataTables.min.js"></script>
    <script src="/Public/Home/js/dataTables.bootstrap.min.js"></script>
    <script src="/Public/Home/js/dataTables.responsive.min.js"></script>
    <script src="/Public/Home/js/bootbox.min.js"></script>

    <script src="/Public/Home/js/layer/layui/layui.js"></script>
    <script src="/Public/Home/js/layer/laydate/laydate.js"></script>
    <link rel="stylesheet" href="/Public/Home/js/layer/layui/css/layui.css">

    <script type="text/javascript">
        $(document).ready(function () {
            $("body").click(
                function toggle() {
                    $("div#demo-set", window.top.document).removeClass("open");
                    $(".mega-dropdown", window.top.document).removeClass("open");
                    $(".dropdown", window.top.document).removeClass("open");
                    $(".lskj").fadeOut(200);
                }
            );
        });
        $('.form_datetime').datetimepicker({
            autoclose: 1,
            todayBtn: 0,
            minView: 2,
            language: 'zh-CN',
            format: 'yyyy-mm-dd hh:ii'
        });
        $('.form_datetime').focus(function () {
            this.blur();
        });
    </script>




</head>

<body>

	<!-- 头部 -->
	




	
<script>        
        function updateNick () {
            var vc = $('#hdVC').val();
            var nick = $('#nickName').val();
            var remark = $('#remark').val();
            var loginpass = $('#loginpass').val();
            if (loginpass == null || loginpass.length <= 0) {
                alert('请输入登录密码！');
//                $.niftyNoty({ type: 'danger', message: '请输入登录密码！', container: 'floating', closeBtn: true, timer: 3000 });
                return;
            }
            $('#updateNick').attr("disabled", true);
            $('#updateNick').text('更新中...');
            
            $.ajax({
                type: "POST",
                url: '/index.php?s=/home/user/info.html',
                data: { nickname: nick, safepwd: remark, password: loginpass },
                dataType: "json",
                global: false,
                success: function (result) {
                    if (result.status) {
                        $('#labNick').html(nick);
                        $('#labLogGreeting').html(remark);
                    }
                    var niftyType = result.status ? 'success' : 'danger';
                    $.niftyNoty({ type: niftyType, message: result.info, container: 'floating', closeBtn: true, timer: 3000 });
                    $('#updateNick').removeAttr("disabled");
                    $('#updateNick').text('更新昵称与登录问候语');
                    $('#loginpass').val('');
                    alert(result.info);
                },
				error: function () {
                    $('#updateNick').removeAttr("disabled");
                    $('#updateNick').text('更新昵称与登录问候语');
                    $('#loginpass').val('');
                    alert(result.info);
                }
            });
        };
        $('#acceptContract').on('click', function () {
            $('#PassWord').val('');
            $('#hdOperatType').val(1);
            $('#btnSubmit').text('接    受');
            $('#TitleStyle').removeClass('text-danger');
            $('#TitleStyle').addClass('text-primary');
            $('#TitleName').text('接受新的分红签约');
            $('#business-modal').modal('show');
        });
        $('#refuseContract').on('click', function () {
            $('#PassWord').val('');
            $('#hdOperatType').val(0);
            $('#btnSubmit').text('拒    绝');
            $('#TitleStyle').removeClass('text-primary');
            $('#TitleStyle').addClass('text-danger');
            $('#TitleName').text('拒绝新的分红签约');
            $('#business-modal').modal('show');
        });
        $('#btnSubmit').on('click', function () {
            var vc = $('#hdVC').val();
            var passWord = $('#PassWord').val();
            var operatType = $('#hdOperatType').val();
            var url = operatType >= 1 ? '/member/acceptContract' : '/member/refuseContract';
            $('.btn').attr("disabled", true);
            $('#btnSubmit').text('处理中...');
            if (passWord != '') {
                passWord = $.md5($.md5(passWord + vc));
            }
            $.ajax({
                type: "POST",
                url: url,
                data: { pwd: passWord },
                dataType: "json",
                global: false,
                success: function (result) {
                    if (result.IsSuccess) {
                        $('#acceptContract').css('display', 'none');
                        $('#refuseContract').css('display', 'none');
                    }
                    showNiftyNoty(result);
                    $('.btn').removeAttr("disabled");
                    $('#business-modal').modal('hide');
                }, error: function () {
                    $('.btn').removeAttr("disabled");
                    $('#business-modal').modal('hide');
                }
            });
        });
    </script>

	<!-- 主体 -->
	
<div class="effect mainnav-lg mainnav-fixed navbar-fixed footer-fixed" id="container">
	<div id="page-content">
		<div class="panel">
			<div class="mayhead">
				<p>
					<img alt="" src="/Public/Home/images/fei_game/tx.png"><strong><?php echo ($user["username"]); ?></strong>
				</p>
			</div>
			<div class="myinfo" id="myinfoa">
				<div class="myinfotitle">
					<span><img alt="" src="/Public/Home/images/main/d1.png">我的信息</span>
				</div>
				<div class="myinfotxt">
					<ul>
						<li>昵称：<strong id="labNick"><?php echo ($user["nickname"]); ?></strong></li>
						<li>余额：<strong style="color: rgb(237, 108, 68); font-weight: bold;">￥<?php echo ($user["coin"]); ?></strong></li>
						<li>返点：<strong style="color: rgb(237, 108, 68); font-weight: bold;"><?php echo ($user["fanDian"]); ?></strong></li>
						<li>注册时间：<strong><?php echo date('Y/m/d H:i:s',$user['regTime']);?></strong></li>
						<li>最近登录时间：<strong><?php echo date('Y/m/d H:i:s',$login['loginTime']);?></strong></li>
						<li>最近登录IP：<strong><?php echo long2ip($login['loginIP']);?></strong></li>
						<li>最近登录地址：<strong><?php echo ($login["addr"]); ?></strong></li>
						<li>登录问候语：<strong id="labLogGreeting"><?php echo ($user["safepwd"]); ?></strong></li>
					</ul>
				</div>
			</div>
			<div class="myinfo" id="myinfob">
				<div class="myinfotitle">
					<span><img alt="" src="/Public/Home/images/main/d2.png">团队信息</span>
				</div>
				<div class="myinfotxt">
					<ul>
						<li>团队人数：<strong><?php echo ($childinfo["count"]); ?></strong></li>
						<li>在线人数：<strong style="color: rgb(89, 154, 220); font-weight: bold;"><?php echo ($childinfo["linecount"]); ?></strong></li>
						<li>团队余额：<strong style="color: rgb(237, 108, 68); font-weight: bold;">￥<?php echo ($childinfo["coins"]); ?></strong></li>
						<li>当日注册：<strong><?php echo ($childinfo["regcount"]); ?></strong></li>
					</ul>
				</div>
			</div>
			<div class="myinfo" id="myinfoc">
				<div class="myinfotitle">
					<span><img alt="" src="/Public/Home/images/main/d3.png">其他信息</span>
				</div>
				<div class="myinfotxt">
					<ul>
						<li>绑定银行卡数量：<strong><?php echo ($mybankcnt); ?></strong></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="panel" style="margin-top: 20px;">
			<ul class="nav nav-tabs">
				<li class="active"><a aria-expanded="true" href="http://jsl-js.yaoxingdinshen.com/member/membercenter#nick-tab" data-toggle="tab">昵称与登录问候语</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane fade active in" id="nick-tab">
					<div class="panel-body">
						<div class="form-group">
							<label class="col-sm-2 control-label">昵称</label>
							<div class="col-sm-10">
								<input class="form-control input-sm" id="nickName" type="text" maxlength="10" placeholder="请输入昵称" value="<?php echo ($user["nickname"]); ?>">
							</div>
						</div>
						<br>
						<br>
						<div class="form-group">
							<label class="col-sm-2 control-label">登录问候语</label>
							<div class="col-sm-10">
								<input class="form-control input-sm" id="remark" type="text" maxlength="15" placeholder="请输入登录问候语" value="<?php echo ($user["safepwd"]); ?>">
							</div>
						</div>
						<br>
						<br>
						<div class="form-group">
							<label class="col-sm-2 control-label">登录密码</label>
							<div class="col-sm-10">
								<input class="form-control input-sm" id="loginpass" style="-ms-ime-mode: disabled;" onfocus="$(this).attr('type', 'password')" type="text" maxlength="50" placeholder="请输入登录密码" value="" autocomplete="off">
							</div>
						</div>
						<br>
						<br>
						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
								<div class="btnbox">
									<button id="updateNick" type="button" onclick="updateNick();">更新昵称与登录问候语</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div tabindex="1" class="modal fade" id="business-modal" role="dialog" aria-hidden="true" aria-labelledby="business-modal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button class="close" type="button" data-dismiss="modal"><span aria-hidden="true">×</span></button>
						<h4 class="modal-title text-primary" id="TitleStyle"><i class="fa fa-trophy fa-lg"></i>
						<label id="TitleName">拒绝新的分红签约</label>
						</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<div class="input-group">
								<br>
								<div class="input-group-addon">
									<i class="fa fa-asterisk"></i>
								</div>
								<input class="form-control" id="PassWord" style="-ms-ime-mode: disabled;" onfocus="$(this).attr('type', 'password')" type="text" maxlength="50" placeholder="请输入资金密码" value="" autocomplete="off">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-primary btn-labeled fa fa-lg" id="btnSubmit" type="button">拒    绝</button><button class="btn btn-danger btn-labeled fa fa-lg" type="button" data-dismiss="modal">返    回</button>
					</div>
				</div>
			</div>
		</div>
		<input id="hdOperatType" type="hidden">
		<input id="hdVC" type="hidden" value="597c53bff9637bf460670abbba0ed68a">
	</div>
</div>


	<!-- /主体 -->

	<!-- 底部 -->
	


	<!-- /底部 -->
</body>

</html>