<?php

$link = "http://www.zarinpal.com/labs/TestIP";

$url = parse_url($link);
$fp = fsockopen($url[host], 80, $err_num, $err_msg, 30) or die("Socket-open failed--error: ".$err_num." ".$err_msg);
fputs($fp, "GET /$url[path]?$url[query] HTTP/1.0\n");
fputs($fp, "Connection: close\n\n");
while(!feof($fp)) {
	$content .= fgets($fp, 128);
}
fclose($fp);

preg_match('/(\d+)\.(\d+)\.(\d+)\.(\d+)/', $content, $matches);

echo $matches[0];
?>