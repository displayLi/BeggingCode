<?php
require_once("core.function.php");
require_once("md5.function.php");
class AlipayNotify {
	var $alipay_config;
	function __construct($alipay_config){
		$this->alipay_config = $alipay_config;
		$this->http_verify_url = $this->alipay_config['apiurl'].'api.php?';
	}
    function AlipayNotify($alipay_config) {
    	$this->__construct($alipay_config);
    }
	function verifyNotify(){
		if(empty($_GET)) {
			return false;
		}
		else {
			$isSign = $this->getSignVeryfy($_GET, $_GET["sign"]);
			$responseTxt = 'true';
			if (preg_match("/true$/i",$responseTxt) && $isSign) {
				return true;
			} else {
				return false;
			}
		}
	}
	function verifyReturn(){
		if(empty($_GET)) {
			return false;
		}
		else {
			$isSign = $this->getSignVeryfy($_GET, $_GET["sign"]);
			$responseTxt = 'true';
			if (preg_match("/true$/i",$responseTxt) && $isSign) {
				return true;
			} else {
				return false;
			}
		}
	}
	function getSignVeryfy($para_temp, $sign) {
		$para_filter = paraFilter($para_temp);
		$para_sort = argSort($para_filter);
		$prestr = createLinkstring($para_sort);
		$isSgin = false;
		$isSgin = md5Verify($prestr, $sign, $this->alipay_config['key']);
		return $isSgin;
	}
	function getResponse($notify_id) {
		$transport = strtolower(trim($this->alipay_config['transport']));
		$partner = trim($this->alipay_config['partner']);
		$veryfy_url = '';
		if($transport == 'https') {
			$veryfy_url = $this->https_verify_url;
		}
		else {
			$veryfy_url = $this->http_verify_url;
		}
		$veryfy_url = $veryfy_url."partner=" . $partner . "&notify_id=" . $notify_id;
		$responseTxt = getHttpResponseGET($veryfy_url, $this->alipay_config['cacert']);
		return $responseTxt;
	}
}
?>
