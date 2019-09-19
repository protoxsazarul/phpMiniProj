<?php
if(isset($_POST['newUser'])){
    $errormsg ="";
    if ($_POST['addUserLastName'] =="") {$errormsg= 'addUserLastName';}
    if ($_POST['addUserFirstName'] =="") {$errormsg= 'addUserfirstName';}
    if ($_POST['addUserPass'] =="") {$errormsg= 'addUserLastName';}
    if ($errormsg ==""){
        SPDO::getInstance()->AddUser($_POST['addUserLastName'],$_POST['addUserFirstName'],$_POST['addUserSection'],$_POST['addUserRole'],sha1($_POST['addUserPass']));
    }
}

?>