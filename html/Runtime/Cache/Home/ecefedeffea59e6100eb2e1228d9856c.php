<?php if (!defined('THINK_PATH')) exit();?><table class="tbl" id="tbproject">
    <tbody>
        <tr>
            <th style="display:none;">
                编号
            </th>
            <th>
                投注时间
            </th>
            <th>
                期号
            </th>
            <th>
                彩种
            </th>
            <th>
                玩法
            </th>
            <th>
                模式
            </th>
            <th>
                倍数
            </th>
            <th>
                投注内容
            </th>
            <th>
                投注金额
            </th>
            <th>
                开奖号码
            </th>
            <th>
                中奖金额
            </th>
            <th>
                状态
            </th>
        </tr>
        <?php foreach($order_list as $var){ ?>
        <tr>
            <td style='display:none;'>
                <a href="javascript:" title="查看投注详情" class="blue" rel="projectinfo" action="<?php echo U('record/betInfo2?id='.$var['id']);?>" data-value="<?php echo ($var['id']); ?>"><?php echo ($var["wjorderId"]); ?></a>
            </td>
            <td>
                <a href="javascript:" title="查看投注详情" class="blue" rel="projectinfo" action="<?php echo U('record/betInfo2?id='.$var['id']);?>" data-value="<?php echo ($var['id']); ?>"><?php echo (date("H:i",$var["actionTime"])); ?></a>
            </td>
            <td><?php echo ($var["actionNo"]); ?></td>
            <td><?php echo ($var["typename"]); ?></td>
            <td><?php echo ($var["playedname"]); ?></td>
            <?php if($var['mode']==2) echo '<td>元</td>'; ?>
            <?php if($var['mode']==0.2) echo '<td>角</td>'; ?>
            <?php if($var['mode']==0.02) echo '<td>分</td>'; ?>
            <?php if($var['mode']==0.002) echo '<td>厘</td>'; ?>
            <td><?php echo ($var["beiShu"]); ?></td>
            <td style="max-width: 200px;overflow:hidden;text-overflow:ellipsis;white-space: nowrap; " title="<?php echo ($var["actionData"]); ?>"><?php echo ($var["actionData"]); ?></td>
            <td><?php echo ($var['beiShu']*$var['mode']*$var['actionNum']); ?>元</td>
            <td><?php echo ($var["lotteryNo"]); ?></td>
            <td><?php echo ($var["bonus"]); ?></td>
            <td>
                <?php if($var['isDelete']==1){ echo '
                    <label class="gray">已撤单</label>'; }elseif($var['lotteryNo'] ==='' ){ echo '
                    <label class="gray">未开奖</label>'; }elseif($var['zjCount']){ echo '
                    <label class="red">已中奖</label>'; }else{ echo '
                    <label class="gray">未中奖</label>'; } ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>