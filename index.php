<?php
session_start();
require_once 'header.php';

if ( !isset($_SESSION['loged']) OR $_SESSION['loged']== false) {
    require_once 'views/Login.php';
}else{
    require_once 'models/admin.php';
}
require_once 'footer.php';

