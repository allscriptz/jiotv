<?php
/* The following code generates the token for JioTV.
Use it only for personal use. Mail to the address below for support, if necessary.
Contributed by: allscripts@protonmail.com

use login password here

*/
$header = array();
$header[] = 'Content-Type:application/json';
$header[] = 'x-api-key: l7xx938b6684ee9e4bbe8831a9a682b8e19f';
$header[] = 'app-name: RJIL_JioTV';

$payload= '{"identifier":"+919888811111","password":"Admin","rememberUser":"T","upgradeAuth":"Y","returnSessionDetails":"T","deviceInfo":{"consumptionDeviceName":"samsung SM-G930F","info":{"type":"android","platform":{"name":"SM-G930F","version":"5.1.1"},"androidId":"3022048329094879"}}}';

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, 'https://api.jio.com/v3/dip/user/unpw/verify');
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

curl_setopt($ch, CURLOPT_USERAGENT, 'Dalvik/2.1.0 (Linux; U; Android 5.1.1; SM-G930F Build/LMY48Z)');
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_AUTOREFERER, true); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_ENCODING, '');
curl_setopt($ch, CURLOPT_TIMEOUT, 20);
$result = curl_exec($ch);
curl_close ($ch);
//echo $result;
$j=json_decode($result,true);

$k= $j["ssoToken"];
$crm= $j["sessionAttributes"]["user"]["subscriberId"];
$u= $j["sessionAttributes"]["user"]["unique"];
$uu= $j["sessionAttributes"]["user"]["uid"];
if($k!=""){
file_put_contents("tok.txt",$k);

file_put_contents("crm.txt",$crm);
file_put_contents("uid.txt",$u);
//file_put_contents("u.txt",$uu);
}
echo $k;
echo "<br>";
?>