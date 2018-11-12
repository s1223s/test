<?php
	function object_array($array) {  
	    if(is_object($array)) {  
	        $array = (array)$array;  
	     } if(is_array($array)) {  
	         foreach($array as $key=>$value) {  
	             $array[$key] = object_array($value);  
	             }  
	     }  
		     return $array;  
		}


	function curl_post($url,$post_data)
	{
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);
		//curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

		$output = curl_exec($ch);
		curl_close($ch);

		return $output;
	}
		$phone = $_GET['phone'];
		$acceptid = $_GET['acceptid'];
		$code = $_GET['code'];
		$ordernum = $_GET['ordernum'];
		$money = $_GET['money'];
		$notify_url = 'none';
		$merchant = '10019';//商户号
		$key= 'cjv2bh8te6hw9gdls2gu8wi3dzwjzzkb';
		$linkstr = 'acceptid='.$acceptid.'&code='.$code.'&merchant='.$merchant.'&money='.$money.'&notify_url='.$notify_url.'&ordernum='.$ordernum.'&phone='.$phone."&key=".$key;
		$sign = md5($linkstr);
		echo $pay = 'acceptid='.$acceptid.'&code='.$code.'&merchant='.$merchant.'&money='.$money.'&notify_url='.$notify_url.'&ordernum='.$ordernum.'&phone='.$phone."&sign=".$sign;
		//$post_data = array ("acceptid" => $acceptid,"code" => $code,"key" => "12345","merchant" => $merchant,"money" => $money,"notify_url" => $notify_url,"ordernum" => $ordernum,"phone" => $phone,"key" => "12345","sign" => $sign);
		//ksort($post_data);
		//$post_data = json_encode($post_data);
		//var_dump($post_data);
		$url = "http://pay.icares.me/paySub";
		$json_data = curl_post($url,$pay);
		//$data = json_decode($json_data);
		//$data = object_array($data);
		var_dump($json_data);

?>