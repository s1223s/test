<?php
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

	$url = 'https://epay.cmbc.com.cn/appweb/lcbpService/queryMchnt.do';
	$data = '{"businessContext":"MIIB6AYKKoEcz1UGAQQCA6CCAdgwggHUAgECMYGdMIGaAgECgBQQPdR+Qf6LDSy93WOAQdd3Iy5f9jANBgkqgRzPVQGCLQMFAARwZ/llcXl0ecxEfe6rCnd5qzvZ1sEgoPa9QPY6A0N1k43MafTntsAfCe4qOnhXFtaqlCu+RHukebM28F2gkipgMNvawApLLQpj2AF0U9gDlqlRZc601O+m2pM1MtIyn1IwLh/dXk8BfJts01JQ97veIDCCAS0GCiqBHM9VBgEEAgEwGwYHKoEcz1UBaAQQfXnMYa4DXsEcOCINUxJRwYCCAQCyUExqaoK8sJA1y0jSXWhvgrady+4wKzx3yFsqI6Z7CPAbK1ng9r4CxG6/h2pONSjrTJBwiJbrUe084M6Hxt1Z0Hfaq0PufQHckX/1NSHzzkzfChtvfDkwOEU+5ZswzfflIw5z6fRhvxI4QjmdwAuQm75PyQfJIuUT018BQlobLuXrQkk551VWvr2qFKOAzYSQl3t6PmEcy8P5hiIvYvRV398hvmwDCosEa5cAe3IAhJgOf1+Mf3ukB1AhpjqTMdtTDPjnrJBypXIgMGw48wgvozA/bBU1GLxhKX1hdOdXTTk8w6D9jlTQmLF4jWEIKaJfVocfjF8WGrQ4iGMk72Xl","merchantNo":"
","merchantSeq":"","reserve1":"","reserve2":"","reserve3":"","reserve4":"","reserve5":"","
reserveJson":"","securityType":"","sessionId":"","source":"","transCode":"","transDate":""
,"transTime":"","version":""}';

echo curl_post($url,$post_data);

?>