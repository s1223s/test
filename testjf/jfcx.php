<?php
//----------------------获取验证胆信-------------------//
	$phone = '13768394784';//手机号（取页面）
	$merchant = '10019';//商户号
	$key= 'cjv2bh8te6hw9gdls2gu8wi3dzwjzzkb';
	$linkstr = "merchant=".$merchant."phone=".$phone."&key=".$key;
	$sign = md5($linkstr);
	$a = "merchant=".$merchant."&phone=".$phone."&sign=".$sign;
	$dx = "http://pay.icares.me/sendIdentifyCodeSub?".$a;
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
		
//-------------查积分余额------------------------//

	/*$json_data = curl_get($dx);
	$data = json_decode($json_data);
	var_dump($data);*/
	//$data = object_array($data);
	//$acceptid = $data['data']['acceptid'];
	$acceptid = '0000201711130164301';
	//echo $acceptid = $data[acceptid];
	//$code = '212705';

	function jcye($acceptid,$code,$key,$merchant,$phone)
	{
		 $linkstr = 'acceptid='.$acceptid.'&code='.$code.'&merchant='.$merchant.'&phone='.$phone."&key=".$key;
		 $sign = md5($linkstr);
		 $ye =  'acceptid='.$acceptid.'&code='.$code.'&merchant='.$merchant.'&phone='.$phone."&sign=".$sign;
		 echo $ye = 'http://pay.icares.me/integralQrySub?'.$ye;
		 echo curl_get($ye);
	}


	jcye($acceptid,$code,$key,$merchant,$phone);

?>

