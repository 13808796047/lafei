<?php if (!defined('THINK_PATH')) exit();?><script src="/Public/Home/js/jquery.min.js"></script>
<script src="/Public/Home/js/bootstrap.min.js"></script>
<script src="/Public/Home/js/jquery.nouislider.all.min.js"></script>
<script src="/Public/Home/js/bootstrap-datetimepicker.min.js"></script>
<script src="/Public/Home/js/bootstrap-datetimepicker.zh-CN.min.js"></script>
<script src="/Public/Home/js/dataTables.min.js"></script>
<script src="/Public/Home/js/dataTables.bootstrap.min.js"></script>
<script src="/Public/Home/js/dataTables.responsive.min.js"></script>
<script src="/Public/Home/js/bootbox.min.js"></script>
<script src="/Public/Home/js/bootstrap-slider.min.js"></script>
<script src="/Public/Home/js/layer/layui/layui.js"></script>
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
<?php
 $stateName=array('已到账', '正在办理', '已取消', '已支付', '失败'); ?>
<title>充值记录－<?php echo S('WEB_NAME');?></title>
<div>
<table width="100%" class="table table-striped" id="my-datatable" cellspacing="0">
	<thead>
		<tr class="table_b_th">
			<th>用户账号</td>
			<th>编号</td>			
			<th>充值金额</td>
			<th>实际到账</td>
			<th>充值银行</td>
			<th>状态</td>
			<th>成功时间</td>
			<th>备注</td>			
		</tr>
	</thead>
	<tbody class="table_b_tr">
	<?php if($data){ foreach($data as $var){ ?>
		<tr>
			<td><?=$var['username']?></td>
			<td><?=$var['rechargeId']?></td>
			<td><?=$var['amount']?></td>
			<td><?=$var['rechargeAmount']?></td>
			<td><?=$bankData[$var['mBankId']]['name']?></td>
			<td><?=$this->iff($var['state'], '充值成功', '<span style="color:#653809">正在处理</span>')?></td>
            <td><?=$this->iff($var['state'], date('m-d H:i:s', $var['actionTime']), '--')?></td>
			<td><?=$var['info']?></td>
		</tr>
	<?php } ?>
	<?php }else{ ?>
    <tr><td colspan="12" width="910px">当前没有查询到任何数据。</td></tr>
    <?php } ?>
	</tbody>
</table>
</div>
<div class="page">
    <?php echo ($_page); ?>
</div>
	<script src="/Public/Home/js/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('.showDetails').bind('click', showBet);
			//解决分页问题
			$('.page a').bind('click', function(){
				if(this.tagName == 'A'){
					var parent = this.parentNode.parentNode;
					var value = $(parent).attr('target');
					if(value=='_blank')
						return true;
					var url = $(this).attr('href');
					$('#record-span').load(url);
					return false;
				}
			});
		});
	</script>