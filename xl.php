<?php
date_default_timezone_set("Asia/Jakarta");
// Copyright: YarzC0de
$config['headers'] = explode("\n", 'Access-Control-Allow-Origin: True
Accept: application/json, text/plain, */*
Content-Type: application/json
Accept-Encoding: gzip, deflate, br
Connection: keep-alive');

echo "Masukan NO XL anda: ";
$asal = trim(fgets(STDIN));

$nomer = $asal;
$i = 0;
$jumlah = "10";
for($i = 0; $i<$jumlah; $i++) {
print_r(curl($nomer));
print '<br>';
}

function curl($nomer) {
	global $config;
	$imei = rand(1000000000, 8000000000);
	$ar = json_encode(array("Header" => null, "Body" => array("Header" => array("ReqID" => date('Y').date('m').date('d').date('H').date('i').date('s'), "IMEI" => $imei), "LoginSendOTPRq" => array("msisdn" => $nomer, "sessionId" => null, "onNet" => false, "platform" => "04", "serviceId" => "", "packageAmt" => "", "reloadType" => "", "reloadAmt" => "", "packageRegUnreg" => "", "appVersion" => "3.7.0", "sourceName" => "Chrome", "sourceVersion" => "", "screenName" => "login.enterLoginOTP"))));
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://my.xl.co.id/pre/LoginSendOTPRq");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_AUTOREFERER, true);
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
