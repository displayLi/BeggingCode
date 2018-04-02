<?php
/**
 * Created by MT管理器
 * User: 烟雨寒云
 * Date: 2018/4/1
 * Time: 6:21
 * 盗版死一户口本
 */
require_once("config.php");
require_once("lib/notify.class.php");
$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyNotify();
if($verify_result) {
	$out_trade_no = $_GET['out_trade_no'];
	$trade_no = $_GET['trade_no'];
	$trade_status = $_GET['trade_status'];
	$type = $_GET['type'];
	if ($_GET['trade_status'] == 'TRADE_SUCCESS') {
	echo "success";	
}
else {
echo "fail";
}
?>