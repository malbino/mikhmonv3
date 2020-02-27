<?php
require('../lib/routeros_api.class.php');

// Ubah sesuai setting mikrotik Anda
define('MIKROTIK_IP', '192.168.88.1');
define('MIKROTIK_USERNAME', 'admin');
define('MIKROTIK_PASSWORD', 'admin');
define('SERVER', 'all');
define('PROFILE', 'default');

$src_address = "0.0.0.0";

$API = new RouterosAPI();
// Aktifkan debug
// $API->debug = true;

if ($API->connect(MIKROTIK_IP, MIKROTIK_USERNAME, MIKROTIK_PASSWORD))
{
    echo "<p>success..<br>";
    
  
    
 
//    $gethosts= $API->comm("terminal/tools/torch",array(
//     "interface"=>"ether1"
//    ));
//     // $res = $API->comm('/tool', 'fetch', FALSE, array('url' => $url), $callback);
		
//     // $gethosts = $API->comm("/torch");

//     print_r($gethosts);
    $API->write('tool/torch', false);
 $API->write('=duration=2', false);
 $API->write('=interface=bridge', false);

 $ARRAY = $API->read();
 print_r($ARRAY[$no]);
 echo "<p>";
 $source = $ARRAY[0]['src-address'];
 $tx = $ARRAY[0]['tx'];
 $rx = $ARRAY[0]['rx'];

 echo "source = $source<br>";
 echo "tx = $tx<br>";
 echo "rx = $rx<br>";
 echo "-------------------------------------<p>";

 }
 else{
    echo "<p>no success..<br>";
 }

$API->disconnect();


echo "<p>porque estas aqui..<br>";
?>

