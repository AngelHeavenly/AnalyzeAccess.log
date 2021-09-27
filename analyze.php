<?php
ini_set('memory_limit', '512M');
$file = file_get_contents('access.log.txt');
//$file = '192.168.32.181 - - [14/06/2017:16:47:02 +1000] "PUT /rest/v1.4/documents?zone=default&_rid=6076537c HTTP/1.1" 200 2 01.510983 "-" "@list-item-updater" prio:0
//192.168.32.581 - - [14/06/2017:16:47:02 +1000] "PUT /rest/v1.4/documents?zone=default&_rid=6076537c HTTP/1.1" 503 2 01.510983 "-" "@list-item-updater" prio:0
//192.168.32.581 - - [14/06/2017:16:47:02 +1000] "PUT /rest/v1.4/documents?zone=default&_rid=6076537c HTTP/1.1" 502 2 01.510983 "-" "@list-item-updater" prio:0';
//echo $file;

$files = explode('
', $file);
$pattern_ip = '(\d+[.]\d+[.]\d+[.]\d+)';
$pattern_date = '(\d+\W\d+\W\d+\W\d+\W\d+\W\d+)';
$pattern_protocol = '(\W\w+\s\S+\s\w+\S\d\W\d\W\s)';
$pattern_error = '(\s[5]\d+\s)';
$pattern_ms = '(\s\d+[.]\d+\s)';
//(\s\d\d[.]\d+)
//var_dump($files);
//(\s\W\d+\W\s\W\w+\s\W\w+\W\w+\W\w+\W\w+\W\w+\W\w+\W\w+\W\w+\s)(\w+\S\d\W\d\W\s)(\d+)(\s)(\d+)(\s)(\d+[.]\d+)
foreach ($files as $return)
{
    //var_dump($files);
    //echo "строка {$return}<br>";
if(preg_match($pattern_ip, $return, $value) &&
   preg_match($pattern_date, $return, $date) &&
   preg_match($pattern_protocol, $return, $protocol)&&
   preg_match($pattern_error, $return, $error)&&
   preg_match($pattern_ms, $return, $ms))
{
    echo "{$value[0]} {$date[0]} {$protocol[0]}{$error[0]}{$ms[0]}<br>";
    //var_dump($error);
    //var_dump($date);
}
    //var_dump($value);

}

    //var_dump($values[0]);
    //echo $values[0]."\n";
    //echo "<br>IP: ".$ip." Date: ".$date."] ERROR: ".$ERROR." ms: ".$times; 
    

//list($ip, $prefix1, $prefix2, $date, $time, $GET, $wall, $HTTP, $ERROR, $value, $times);


?>