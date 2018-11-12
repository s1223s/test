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
	function curl_get($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);

		$output = curl_exec($ch);
		curl_close($ch);
		//print_r($output);
		return $output;
		}
	
		$phone = $_GET['phone'];
		$merchant = '10019';//商户号
		$key= 'kkwqfutqhoe8hp50yixz1k8qh20u6rk5';
		$linkstr = "merchant=".$merchant."phone=".$phone."&key=".$key;
		$sign = md5($linkstr);
		$a = "merchant=".$merchant."&phone=".$phone."&sign=".$sign;
		$dx = "http://pay.icares.me/sendIdentifyCodeSub?".$a;
		
		$json_data = curl_get($dx);
		$data = json_decode($json_data);
		$data = object_array($data);
		$acceptid = $data['data']['acceptid'];
		header("Content-type: application/json");
		exit(json_encode($acceptid));
?>