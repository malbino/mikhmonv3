<?php 
if(substr($_SERVER["REQUEST_URI"], -10) == "config.php"){header("Location:./");}; 

//recuperar username
$user = $_POST['user'];
if ($user=="admin") {
    $data['mikhmon'] = array ('1'=>'mikhmon<|<admin','mikhmon>|>YluTnJ6bpmNiamE==');
}
elseif($user=="docente"){
    $data['mikhmon'] = array ('1'=>'mikhmon<|<docente','mikhmon>|>fKCVnZ+mnVtcamFkaA==');
}


$data['Infocal1'] = array ('1'=>'Infocal1!192.168.88.1','Infocal1@|@admin','Infocal1#|#mZWfoZ8=','Infocal1%Infocal1','Infocal1^Infocal1','Infocal1&Rp','Infocal1*10','Infocal1(1','Infocal1)','Infocal1=10','Infocal1@!@disable');
$data['Infocal2020'] = array ('1'=>'Infocal2020!192.168.88.1','Infocal2020@|@admin','Infocal2020#|#mZWfoZ8=','Infocal2020%infocal','Infocal2020^infocal','Infocal2020&Rp','Infocal2020*10','Infocal2020(1','Infocal2020)','Infocal2020=10','Infocal2020@!@enable');





//Admin
// user:admin 
// password:**admiN2020
// //Useranem
// user:docente
// password:Docente**2020
