<?php
/* The following code generates the token for JioTV.
Use it only for personal use. Mail to the address below for support, if necessary.
Contributed by: allscripts@protonmail.com
*/
$jctBase = "cutibeau2ic";

$ssoToken =file_get_contents("tok.txt"); 
$uid =file_get_contents("uid.txt"); 
$crm =file_get_contents("crm.txt"); 

function tokformat($str)
{
$str= base64_encode(md5($str,true));

return str_replace("\n","",str_replace("\r","",str_replace("/","_",str_replace("+","-",str_replace("=","",$str)))));

}


function generateJct($st, $pxe) 
{
 global $jctBase;
 return trim(tokformat($jctBase . $st . $pxe));
}

function generatePxe() {
return time() + 1000;
}

function generateSt() {
global $ssoToken;
return tokformat($ssoToken);
}

function generateToken() {
$st = generateSt();
$pxe = generatePxe();
$jct = generateJct($st, $pxe);

return "?jct=" . $jct . "&pxe=" . $pxe . "&st=" . $st;
}

$p= generateToken();

$url="https://tv.media.jio.com/streams_live/"  . $_REQUEST["key"] . $p;

$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
   'deviceId: aaaaaaaaaaaaaa','crmid: ' . $crm,'usergroup: tvYR7NSNn7rymo3F','versionCode: 219','userId: rilxxxxxxx','appkey: NzNiMDhlYzQyNjJm','uniqueId: '  . $uid,'devicetype: phone','os: android','srno: 11111111111','osVersion: 5.1.1','subscriberId: '  . $crm,'channelid: ' .  @$_GET["id"],'lbcookie: 1','ssotoken: ' . $ssoToken,'User-Agent: plaYtv/5.8.3 (Linux;Android 5.1.1) ExoPlayerLib/2.8.0'));

curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_USERAGENT,'plaYtv/5.8.3 (Linux;Android 5.1.1) ExoPlayerLib/2.8.0');
$contents = curl_exec($ch);
if (curl_errno($ch)) {
   $contents = '';
} else {
  curl_close($ch);
}

echo $contents;

?>