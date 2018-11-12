<?php

//发送get数据
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
//接收json
	function object_array($array) {  
    if(is_object($array)) {  
        $array = (array)$array;  
     } if(is_array($array)) {  
         foreach($array as $key=>$value) {  
             $array[$key] = object_array($value);  
             }  
     }
 }
//发送短信
     function sendcode()
     {
     	$phone = $_GET['phone'];
     	echo $phone = json_encode($phone);
     }

?>