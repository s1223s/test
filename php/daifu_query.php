<?php
require_once 'inc.php';
require_once 'HttpClient.class.php';



			$data['version']		=	'1.0';
			$data['customerid']		=	$userid;
			$data['sdorderno']		=	'2018071810272480298767';

			$sign=md5('version='.$data['version'].'&customerid='.$data['customerid'].'&sdorderno='.$data['sdorderno'].'&'.$userkey);
			$data['sign']			=	$sign;
			

			$payurl	=	'http://www.8237738.com/daifu/query';

			$http = new HttpClient('www.8237738.com');

			//$http	->setDebug(true);
		
			if (!$http->post($payurl,$data)) {    
				die('An error occurred: '.$http->getError());   
			}

			$fanhui = $http->getContent();
			print_r($fanhui);


?>