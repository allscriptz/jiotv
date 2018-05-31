<?php

/* The following code retrieves the m3u8 playlist from JioTV

Replace http://url_to_token/ with the URL to token retrieved by JioAPI

Usage format: http://localhost/m3u8.php?c=9XM&q=600

Contributed by: allscripts@protonmail.com

*/

header("Content-Type: application/vnd.apple.mpegurl");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Expose-Headers: Content-Length,Content-Range");
header("Access-Control-Allow-Headers: Range");
header("Accept-Ranges: bytes");

date_default_timezone_set('Asia/Kolkata');

$cache= (string)date("dHi") . ".txt";


if(!file_exists($cache)){


$p= @file_get_contents("http://url_to_token/");


file_put_contents($cache, $p);


}
else
{
$p=file_get_contents($cache);

}


if($p!="" && @$_REQUEST["c"]!=""){


$opts = [
    "http" => [
        "method" => "GET",
        "header" => "User-Agent: ExoPlayerDemo/5.2.0 (Linux;Android 4.4.4) ExoPlayerLib/2.3.0\r\n" 


    ]
];

$cx = stream_context_create($opts);


$hs = file_get_contents("http://sbbsrcdnems05.cdnsrv.jio.com/jiotv.live.cdn.jio.com/" . $_REQUEST["c"] . "/" . $_REQUEST["c"] . "_" . $_REQUEST["q"] . ".m3u8" .  $p,false,$cx);


$hs= @preg_replace("/" . $_REQUEST["c"] . "_" . $_REQUEST["q"] ."-([^.]+\.)ts/", 'http://shdbdcdnems01.cdnsrv.jio.com/jiotv.live.cdn.jio.com/'  . $_REQUEST["c"] . '/' .   $_REQUEST["c"] . '_' . $_REQUEST["q"] . '-\1ts', $hs);
$hs= @preg_replace("/" . $_REQUEST["c"] . "_" . $_REQUEST["q"] ."-([^.]+\.)key/", 'http://shdbdcdnems01.cdnsrv.jio.com/jiotv.live.cdn.jio.com/'  . $_REQUEST["c"] . '/' .   $_REQUEST["c"] . '_' . $_REQUEST["q"] . '-\1key', $hs);


$hs=str_replace("https://tv.media.jio.com/streams_live/" .  $_REQUEST["c"] . "/","",$hs);
$hs = str_replace("https://tv.media.jio.com/streams_hotstar/" . $_REQUEST["c"] . "/","",$hs);

echo $hs;

}

?>