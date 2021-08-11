<?php
/* The following code generates the token for JioTV.
Use it only for personal use. Mail to the address below for support, if necessary.
Contributed by: allscripts@protonmail.com
*/

header("Content-Type: application/vnd.apple.mpegurl");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Expose-Headers: Content-Length,Content-Range");
header("Access-Control-Allow-Headers: Range");
header("Accept-Ranges: bytes");


$p="?jct=0JLSVWcfnsUab5Hmh0MM1g&pxe=1648926372&st=2rABpyTLSDzkoYSlKcWJhg";


if($p!="" && @$_REQUEST["c"]!=""){


$opts = [
    "http" => [
        "method" => "GET",
        "header" => "User-Agent: JioTV plaYtv/5.3.2 (Linux;Android 5.1.1) ExoPlayerLib/2.3.0\r\nConnection: close\r\n" 


    ]
];

$cx = stream_context_create($opts);


$hs = file_get_contents("http://gdcsite.cdnsrv.jio.com/jiotv.live.cdn.jio.com/" . $_REQUEST["c"] . "/" . $_REQUEST["c"] . "_" . $_REQUEST["q"] . ".m3u8" .  $p,false,$cx);

$hs= @preg_replace("/" . $_REQUEST["c"] . "_" . $_REQUEST["q"] ."-([^.]+\.)key/", 'tests.php?id=0&key='  . $_REQUEST["c"] . '/' .   $_REQUEST["c"] . '_' . $_REQUEST["q"] . '-\1key', $hs);
$hs= @preg_replace("/" . $_REQUEST["c"] . "_" . $_REQUEST["q"] ."-([^.]+\.)ts/", 'streamj.php?ts='  . $_REQUEST["c"] . '/' .   $_REQUEST["c"] . '_' . $_REQUEST["q"] . '-\1ts', $hs);
//$hs= @preg_replace("/" . $_REQUEST["c"] . "_" . $_REQUEST["q"] ."-([^.]+\.)ts/", 'http://jiotv.live.cdn.jio.com/'  . $_REQUEST["c"] . '/' .   $_REQUEST["c"] . '_' . $_REQUEST["q"] . '-\1ts', $hs);

$hs=str_replace("https://tv.media.jio.com/streams_live/" .  $_REQUEST["c"] . "/","",$hs);
$hs = str_replace("https://tv.media.jio.com/streams_hotstar/" . $_REQUEST["c"] . "/","",$hs);

echo $hs;

}

?>