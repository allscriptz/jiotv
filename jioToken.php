<?php

/* The following code generates the token for JioTV.

Use it only for personal use. Mail to the address below for support, if necessary.

Contributed by: allscripts@protonmail.com

*/


$jctBase = "cutibeau2ic";

$ssoToken = "AQIC5wM2LY4SfczEZE2fGevb0t17TAm-G9kAMvxhtxL4oGU.*AAJTSQACMDIAAlNLABQtMTkwNjA5MTA1OTI5NDc0NTI1MgACUzEAAjQ4*";

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
return time() + 6000000;
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

echo generateToken();

?>