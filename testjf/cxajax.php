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
		$acceptid = $_GET['acceptid'];
		$code = $_GET['code'];
		$merchant = '10015';//商户号
		$key= 'kkwqfutqhoe8hp50yixz1k8qh20u6rk5';
		$linkstr = 'acceptid='.$acceptid.'&code='.$code.'&merchant='.$merchant.'&phone='.$phone."&key=".$key;
		$sign = md5($linkstr);
		echo $ye =  'acceptid='.$acceptid.'&code='.$code.'&merchant='.$merchant.'&phone='.$phone."&sign=".$sign;
		$ye = 'http://pay.icares.me/integralQrySub?'.$ye;

		$json_data = curl_get($ye);
		$data = json_decode($json_data);
		print_r($data);
		$data = object_array($data);
		$acceptid = $data['data']['poi_num'];
		header("Content-type: application/json");
		exit(json_encode($acceptid));
?>