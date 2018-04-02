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
?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $sitename?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://css.letvcdn.com/lc04_yinyue/201612/19/20/00/bootstrap.min.css">
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<body background="https://ww2.sinaimg.cn/large/a15b4afegy1fpp139ax3wj200o00g073.jpg">
<?php
$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyReturn();
if($verify_result) {
	$out_trade_no = $_GET['out_trade_no'];
	$trade_no = $_GET['trade_no'];
	$trade_status = $_GET['trade_status'];
	$type = $_GET['type'];
   if($_GET['trade_status'] == 'TRADE_SUCCESS') {
    }
    else {
      echo "trade_status=".$_GET['trade_status'];
    }
	 echo '
  <div class="container" style="padding-top:70px;">
  <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
  <div class="panel panel-success">                    
  <div class="panel-body">
	<center>
 <h3><font color="green">施舍成功</font></h3>
 <hr/>
	<h3 class="btn btn-success btn-block" >谢谢啦，好人有好报！</h3>
 <br/>
        </center>
        </div>
        </div>
        </div>
        </div> ';
}
else {
	echo ' <div class="container" style="padding-top:70px;">
  <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
  <div class="panel panel-danger">
  <div class="panel-body">
	<center>
	<h3><font color="red">验证失败</font></h3>
	<hr/>
	<h3 class="btn btn-danger btn-block" >倒霉孩子，施舍失败啦！</h3>
  <br/>
        </center>
        </div>
        </div>
        </div>
        </div> ';
}
?>
</body>
</html>