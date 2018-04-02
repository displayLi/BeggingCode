<?php
require_once("core.function.php");
require_once("md5.function.php");
class AlipaySubmit {
	var $alipay_config;
	function __construct($alipay_config){
		$this->alipay_config = $alipay_config;
		$this->alipay_gateway_new = $this->alipay_config['apiurl'].'submit.php?';
	}
    function AlipaySubmit($alipay_config) {
    	$this->__construct($alipay_config);
    }
	function buildRequestMysign($para_sort) {
		$prestr = createLinkstring($para_sort);
		$mysign = md5Sign($prestr, $this->alipay_config['key']);
		return $mysign;
	}
	function buildRequestPara($para_temp) {
		$para_filter = paraFilter($para_temp);
		$para_sort = argSort($para_filter);
		$mysign = $this->buildRequestMysign($para_sort);
		$para_sort['sign'] = $mysign;
		$para_sort['sign_type'] = strtoupper(trim($this->alipay_config['sign_type']));
		return $para_sort;
	}
	function buildRequestParaToString($para_temp) {
		$para = $this->buildRequestPara($para_temp);
		$request_data = createLinkstringUrlencode($para);
		return $request_data;
	}
	function buildRequestForm($para_temp, $method='POST', $button_name='正在跳转') {
		$para = $this->buildRequestPara($para_temp);
		$sHtml = "<form id='alipaysubmit' name='alipaysubmit' action='".$this->alipay_gateway_new."_input_charset=".trim(strtolower($this->alipay_config['input_charset']))."' method='".$method."'>";
		while (list ($key, $val) = each ($para)) {
            $sHtml.= "<input type='hidden' name='".$key."' value='".$val."'/>";
        }
        $sHtml = $sHtml."<input type='submit' value='".$button_name."'></form>";
		$sHtml = $sHtml."<script>document.forms['alipaysubmit'].submit();</script>";
		return $sHtml;
	}
}
?>