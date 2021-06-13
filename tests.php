<?php

/* The following code fetches the m3u8 aes key from JioTV.
Use it only for personal use. Mail to the address below for support, if necessary.
Contributed by: allscripts@protonmail.com


place the headers uid , crm in uid.txt and crm.txt files respectively
*/


$ssoToken =file_get_contents("tok.txt"); 
$uid =file_get_contents("uid.txt"); 
$crm =file_get_contents("crm.txt"); 



$p= file_get_contents("http://localhost/jioToken.php");

$url="https://tv.media.jio.com/streams_live/"  . $_REQUEST["key"] . $p;

$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
   'deviceId: aaaaaaaaaaaaaa','crmid: ' . $crm,'usergroup: tvYR7NSNn7rymo3F','versionCode: 219','userId: rilxxxxxxx','appkey: NzNiMDhlYzQyNjJm','uniqueId: '  . $uid,'devicetype: phone','os: android','srno: 11111111111','osVersion: 5.1.1','subscriberId: '  . $crm,'channelid: ' .  @$_GET["id"],'lbcookie: 1','ssotoken: ' . $ssoToken,'User-Agent: plaYtv/5.8.3 (Linux;Android 5.1.1) ExoPlayerLib/2.8.0'));

curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_USERAGENT,'plaYtv/5.8.3 (Linux;Android 5.1.1) ExoPlayerLib/2.8.0');
$contents = curl_exec($ch);


echo $contents;

?>