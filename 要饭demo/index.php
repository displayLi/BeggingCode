<?php
/**
 * Created by MT管理器
 * User: 烟雨寒云
 * Date: 2018/4/1
 * Time: 6:21
 * 盗版死一户口本
 */
include("config.php");
function get_curl($url, $post = 0, $referer = 0, $cookie = 0, $header = 0, $ua = 0, $nobaody = 0)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $klsf[] = "Accept:*/*";
    $klsf[] = "Accept-Encoding:gzip,deflate,sdch";
    $klsf[] = "Accept-Language:zh-CN,zh;q=0.8";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $klsf);
    if ($post) {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    if ($header) {
        curl_setopt($ch, CURLOPT_HEADER, TRUE);
    }
    if ($cookie) {
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    }
    if ($referer) {
        if ($referer == 1) {
            curl_setopt($ch, CURLOPT_REFERER, "http://m.qzone.com/infocenter?g_f=");
        } else {
            curl_setopt($ch, CURLOPT_REFERER, $referer);
        }
    }
    if ($ua) {
        curl_setopt($ch, CURLOPT_USERAGENT, $ua);
    } else {
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; U; Android 4.0.4; es-mx; HTC_One_X Build/IMM76D) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0');
    }
    if ($nobaody) {
        curl_setopt($ch, CURLOPT_NOBODY, 1);//主要头部
        //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);//跟随重定向
    }
    curl_setopt($ch, CURLOPT_ENCODING, "gzip");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $ret = curl_exec($ch);
    curl_close($ch);
    return $ret;
}
function get_curl_self($url, $post = 0)
{
    $ch = curl_init();
	$urlarr = parse_url($url);
	if($urlarr['host']==$_SERVER['HTTP_HOST'] && !ini_get('acl.app_id')){
		$url=str_replace('http://'.$_SERVER['HTTP_HOST'].'/','http://127.0.0.1:80/',$url);
		$url=str_replace('https://'.$_SERVER['HTTP_HOST'].'/','https://127.0.0.1:443/',$url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Host: '.$_SERVER['HTTP_HOST']));
	}
    curl_setopt($ch, CURLOPT_URL, $url);
	if ($post) {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $ret = curl_exec($ch);
    curl_close($ch);
    return $ret;
}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<title><?php echo $sitename?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=0.9">
<link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://css.letvcdn.com/lc04_yinyue/201612/19/20/00/bootstrap.min.css">
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<body background="https://ww2.sinaimg.cn/large/a15b4afegy1fpp139ax3wj200o00g073.jpg">
<div class="container" style="padding-top:20px;">
<div class="col-xs-12 col-sm-10 col-lg-5 center-block" style="float: none;">
<div class="panel panel-primary">
<div class="panel-heading" style="background: linear-gradient(to right,#8ae68a,#5ccdde,#b221ff);"><center><font color="#000000"><b><?php echo $panel?></b></font></center></div>
<div class="panel-body">
<center><div class="alert alert-success"><a href="http://wpa.qq.com/msgrd?v=3&uin=463961434&site=qq&menu=yes"><img class="img-circle m-b-xs" style="border: 2px solid #1281FF; margin-left:3px; margin-right:3px;" src="link-logo.png"; width="60px" height="60px" alt="<?php echo $sitename?>"><br></a>大哥哥大姐们啊！你们都是有钱的人呐～谁有那多余的零钱？给我这流浪的人啊...
</div></center>
<form name=alipayment action=pay.php method=post target="_blank">
<div class="input-group">			 
<span class="input-group-addon"><span class="glyphicon glyphicon-barcode"></span> 施舍单号</span>
<input size="30" name="WIDout_trade_no" value="<?php echo date("YmdHis").mt_rand(100,999); ?>"  class="form-control" />
</div>
<br/>
<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-shopping-cart"></span> 施舍留言</span>
<input size="30" name="WIDsubject" value="呐～施舍给你的！" class="form-control" required="required" />			   
</div>
<br/>
<div class="input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-yen"></span> 施舍金额</span>
<input size="30" name="WIDtotal_fee" value="1" class="form-control" required="required"/>			        
</div>        			
<br/> 
<center><div class="alert alert-warning">选择一种方式进行施舍...</div></center>
<center>
<div class="btn-group btn-group-justified" role="group" aria-label="...">
<div class="btn-group" role="group">
<button type="radio" name="type" value="alipay" class="btn btn-primary">支付宝</button>
</div>
<div class="btn-group" role="group">
<button type="radio" name="type" value="qqpay" class="btn btn-danger">QQ</button>
</div>
<div class="btn-group" role="group">
<button type="radio" name="type" value="wxpay" class="btn btn-info">微信</button>
</div>
</div>
<p style="text-align:center"><br>&copy; Powered by <a href="/"><?php echo $copy?></a>!</p>
</div>
</center> 
</div>
</form>
</div>
<?php
$data = get_curl($alipay_config['apiurl'] . "api.php?act=orders&limit=10&pid=" . $alipay_config['partner'] . "&key=" . $alipay_config['key'] . "&url=" . $_SERVER["HTTP_HOST"]);
$arr = json_decode($data, true);
if ($arr["code"] == 0 - 2) {
	showmsg("易支付配置信息有误！");
}
echo "<div class=\"col-xs-12 col-sm-10 col-lg-5 center-block\" style=\"float: none;\"><div class=\"panel panel-primary\"><div class=\"panel-heading\" style=\"background: linear-gradient(to right,#b221ff,#14b7ff,#8ae68a);\"><center><font color=\"#000000\"><b>大佬们的施舍记录</b></font></center></div><div class=\"table-responsive\">\r\n<table class=\"table table-striped\">\r\n<thead><tr><th>订单号</th><th>施舍方式</th><th>施舍金额</th><th>状态</th></tr></thead>\r\n<tbody>";
	foreach ($arr["data"] as $res) {
	echo "<tr><td>" . $res["trade_no"] . "</td><td>" . $res["type"] . "</b></td><td>" . $res["money"] . "元</b></td><td>" . ($res["status"] == 1 ? "<font color=green>已完成施舍</font>" : "<font color=red>未完成施舍</font>") . "</td></tr>";
	}
echo "</tbody>\r\n</table>\r\n</div>\r\n\t</div>";
?>
</div>
<audio autoplay="autoplay" height="100" width="100">
<source src="http://fs.open.kugou.com/828d5dab152cf7f69955bb6d4ff24368/5ac07eeb/G051/M08/16/0D/E5QEAFa013SAbi3PAB58QBH_fNo118.mp3" type="audio/mp3" />
</audio> 
</body>
</html>