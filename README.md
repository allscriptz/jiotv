<?php
/* The following code retrieves the ssoToken in a Jio network that is useful in JioTV.

Contributed by: allscripts@protonmail.com

*/

$API_TOKEN_URL = "http://api.jio.com/v2/users/me";

$opts = array(
  'http'=>array(
  'protocol_version' => 1.1,
    'method'=>"GET",
    'header'=>"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8\r\nAccept-Language: en-US,en;q=0.5\r\nUser-Agent: Mozilla/5.0 (Windows NT 10.0; rv:59.0) Gecko/20100101 Firefox/59.0\r\nConnection: keep-alive\r\n" 
  )
);

$context = stream_context_create($opts); 

$data = file_get_contents($API_TOKEN_URL,false,$context);


$token=json_decode($data,true);

echo $token["ssoToken"];

?>
