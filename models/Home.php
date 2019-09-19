<?php
require_once "controllers/SPDO.php";


var_dump($user);
if ($user[4]==0){
    $notes =  SPDO::getInstance()->getData($user[0]);
    include_once 'user.php';
}elseif($user[4]=1){
    include_once 'admin.php';
}
