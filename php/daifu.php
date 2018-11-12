<?php
require_once 'inc.php';
require_once 'HttpClient.class.php';

			$order_id_main = date('YmdHis') . rand(10000000,99999999);



			//代付格式 注意 {分割} 代表回车来批量提交
			$daifutext='622222222222222222|张三|工商银行|600.00|江苏省常州市天宁区支行{分割}622222222222222222|张三|工商银行|500.00|江苏省常州市天宁区支行';


			$data['version']		=	'1.0';
			$data['customerid']		=	$userid;
			$data['sdorderno']		=	$order_id_main;
			$data['tel']			=	'18898491780';
			$data['daifutext']		=	$daifutext;
			$data['notifyurl']		=	'http://'.$_SERVER['HTTP_HOST'].'/demo/dn.php';




			$sign=md5('version='.$data['version'].'&customerid='.$data['customerid'].'&sdorderno='.$data['sdorderno'].'&tel='.$data['tel'].'&daifutext='.$daifutext.'&'.$userkey);
			$data['sign']			=	$sign;

			$payurl	=	'http://www.8237738.com/daifu';

			$http = new HttpClient('www.8237738.com');

			//$http	->setDebug(true);
		
			if (!$http->post($payurl,$data)) {    
				die('An error occurred: '.$http->getError());   
			}


			$getHeaders = $http->getHeaders();


			//print_r($getHeaders);

			$fanhui = $http->getContent();



			print_r($fanhui);


?>