<?php
/**
 * Created by MT管理器
 * User: 烟雨寒云
 * Date: 2018/4/1
 * Time: 6:21
 * 盗版死一户口本
 */
 
//商户ID
$alipay_config['partner']		= '1491';

//商户KEY
$alipay_config['key']			= 'k5Ux7nNUIP5mNC8GU2m7z22u6U6K5muu';

//签名方式 不需修改
$alipay_config['sign_type']    = strtoupper('MD5');

//字符编码格式 目前支持 gbk 或 utf-8
$alipay_config['input_charset']= strtolower('utf-8');

//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
$alipay_config['transport']    = 'http';

//通知地址，改成你自己的url，注意如果支持请选择https；若不支持请选择http
$notify_url = "http://www.yyhy.me/notify_url.php";

//返回地址，改成你自己的url，注意如果支持请选择https；若不支持请选择http
$return_url = "http://www.yyhy.me/return_url.php";

//站点名称
$sitename = 'Joney24H全自动在线要饭';

//panel标题
$panel = '穷的毛都不剩的小Joney、';

//底部版权
$copy = 'Joney && LINK创意工作室';

//站长QQ
$qq = '463961434';

//易支付对接API地址
$alipay_config['apiurl']    = 'http://pay.yyhyo.com/';
?>
