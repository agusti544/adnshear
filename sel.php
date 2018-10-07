<?php
// Copyright: YarzC0de
$config['headers'] = explode("\n", 'Host: tdwidm.telkomsel.com:443
Accept: application/json, text/javascript
Accept-Encoding: gzip, deflate, br
Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7
Auth0-Client: eyJuYW1lIjoiYXV0aDAuanMiLCJ2ZXJzaW9uIjoiNy42LjEifQ
Content-Type: application/x-www-form-urlencoded
Origin: https://my.telkomsel.com
Referer: https://my.telkomsel.com/
User-Agent: Mozilla/5.0 (Linux; Android 8.0; Pixel 2 Build/OPD3.170816.012) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Mobile Safari/537.36
X-DevTools-Emulate-Network-Conditions-Client-Id: BE693DDA90E0BB7932C31CE51562D3A9');


$nomer = 'Input-Nomer-Tsel';
$i = 0;
$jumlah = "10";
print_r(curl($nomer));

function curl($nomer) {
	$nomer = str_replace('62', '%2B62', $nomer);
	global $config;
	$ar = 'client_id=Xlj9pkfK6yYumf6G8KE2S5TDWgTtczb0&phone_number='.$nomer.'&connection=sms';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://tdwidm.telkomsel.com/passwordless/start");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $config['headers']);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $ar);
	$a = curl_exec($ch);
	curl_close($ch);

	return $a;
}
