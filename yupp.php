<?php

/* The following code retrieves the m3u8 link from YuppTV (FTA channels)
Usage format: http://localhost/yupptv.php?c=9XM

Contributed by: allscripts@protonmail.com

*/

session_start();

$postdata = http_build_query(
    array(
        "vdevid" => 5,
    "vtenantId" => 3,
    "vstreamname" => $_REQUEST["c"],
    "vstreamkey" => "LIVE",
    "vapi" => "",
    "vuserid" => "",
    "vbox" => "",
    "format" => "json",
    "isseekstarttime" => "",
    "isseekendtime" => ""
    )
);

$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata
    )
);

$context  = stream_context_create($opts);

$result = file_get_contents("http://apidon.yupptv.in/YuppSlateMobileService.svc/getstreamurlbyname", false, $context);


$arr=json_decode($result,true);


$_SESSION["m3u"] = $arr["streamurl2"];
header("Location: " . $arr["streamurl2"]);

//echo var_dump($arr);



?>