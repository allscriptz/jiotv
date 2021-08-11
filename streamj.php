<?php
/* The following code generates the token for JioTV.
Use it only for personal use. Mail to the address below for support, if necessary.
Contributed by: allscripts@protonmail.com
*/
if(@$_REQUEST["ts"]!="")
{
header("Content-Type: video/mp2t");
header("Connection: keep-alive");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Expose-Headers: Content-Length,Content-Range");
header("Access-Control-Allow-Headers: Range");
header("Accept-Ranges: bytes");
	$opts = [
    "http" => [
        "method" => "GET",
        "header" => "User-Agent: plaYtv/5.3.2 (Linux;Android 5.1.1) ExoPlayerLib/2.3.0/2.3.0\r\nConnection: close\r\n" 


    ]
];

$context = stream_context_create($opts);
//$haystack = file_get_contents("http://snoidcdnems05.cdnsrv.jio.com/jiotv.live.cdn.jio.com/"  . $_REQUEST["ts"],false,$
$haystack = file_get_contents("http://jiotv.live.cdn.jio.com/"  . $_REQUEST["ts"],false,$context);


echo $haystack;

}

?>