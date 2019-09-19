<?php
require_once "controllers/SPDO.php";
$user =$_SESSION['user'];
$error=false ;
$sections = SPDO::getInstance()->getSection("none");
if(isset($_GET['menu'])) {
    switch ($_GET['menu']) {
        case 'pwdchanger':
            $pwdchang = array('active', 'true', 'show active');
            break;
        case 'AddUser':
            $AddUser = array('active','true', 'show');
            break;
        case 'ModUser':
            $ModUser = array('active', 'true', 'show');
            break;
        case 'SeeNotes':
            $SeeNotes = array('active', 'true', 'show');
            break;
        case 'AddNotes':
            $AddNotes = array('active', 'true', 'show');
            break;
    }
}
?>
<p><?= $user[1]." ".$user[2] ?>, vous êtes à present connecté(e)  </p>
<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link " id="nav-disconnect-tab" href="../disconnect.php">disconnect</a>
        <a class="nav-item nav-link " id="nav-pwdchang-tab" data-toggle="tab" href="#nav-pwdchang" role="tab" aria-controls="nav-pwdchang" aria-selected="false">changer mot de passe</a>
        <a class="nav-item nav-link " id="nav-AddUse-tab" data-toggle="tab" href="#nav-AddUser" role="tab" aria-controls="nav-AddUser" aria-selected="false">Ajout User</a>
        <a class="nav-item nav-link " id="nav-ModUser-tab" data-toggle="tab" href="#nav-ModUser" role="tab" aria-controls="nav-profile" aria-selected="false">Modifier User</a>
        <a class="nav-item nav-link active " id="nav-SeeNotes-tab" data-toggle="tab" href="#nav-SeeNotes" role="tab" aria-controls="nav-SeeNotes" aria-selected="true">Voir notes</a>
        <a class="nav-item nav-link " id="nav-AddNotes-tab" data-toggle="tab" href="#nav-AddNotes" role="tab" aria-controls="nav-AddNotes" aria-selected="false">Ajouter notes</a>
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade" id="nav-pwdchang" role="tabpanel" aria-labelledby="nav-pwdchang-tab"><?php include_once 'views/PwdChanger.php'; ?></div>
    <div class="tab-pane fade" id="nav-AddUser" role="tabpanel" aria-labelledby="nav-AddUse-tab">add user <?php include_once 'views/addUser.php'?></div>
    <div class="tab-pane fade " id="nav-ModUser" role="tabpanel" aria-labelledby="nav-ModUser-tab"><?php include_once 'views/modUser.php'; ?> </div>
    <div class="tab-pane fade show active " id="nav-SeeNotes" role="tabpanel" aria-labelledby="nav-SeeNotes-tab">SeeNotes</div>
    <div class="tab-pane fade " id="nav-AddNotes" role="tabpanel" aria-labelledby="nav-addNotes-tab">AddNotes</div>
</div>
