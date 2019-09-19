<?php
$user =$_SESSION['user'];
$error=false;
if(isset($_POST['login']) AND isset($_POST['pass'] )){
    $pdo = SPDO::getInstance();
    $login =  $pdo->login($_POST['login'],$_POST['pass']);
    echo "dans le 1er if ";
    if ($login == false AND $_POST['confirmBtn']== 'confirm'){
        $_POST["pwdchang"]='true';
        $error= true;
    }else if ($login !== false AND isset($_POST['confirmBtn']) AND $_POST['confirmBtn']== 'confirm') {
        if ($_POST['Newpass'] == $_POST['Confpass'] AND $_POST['Newpass'] !="" AND $_POST['Confpass']!='' ){
            $newpass = sha1($_POST['Newpass']);
            SPDO::getInstance()->pwdchange($user[0],$newpass);

        }else{
            $error= true;
            $_POST["pwdchang"]='true';
        }
    }
}
?>
<section class="container-fluid">
    <div>
        <p><?= $user[1]." ".$user[2] ?> , vous êtes à present connecté(e)  </p>
        <form action="" method="post">
            <a class="btn btn-link" href="../disconnect.php">disconnect</a>
            <button class="btn btn-link" type="submit" name="pwdchang" value="true">changer mot de passe</button>
        </form>
    </div>
    <?php if(isset($_POST['pwdchang']) && $_POST['pwdchang'] == 'true'){
        include_once 'views/PwdChanger.php';
      } else { ?>
        <div class="row col-5">
            <table class="table">
                <tr>
                    <th scope="row">Titre</th>
                    <?php
                    foreach ($notes as $note):
                        ?>
                        <td><?=$note[0]?></td>
                    <?php endforeach;?>
                </tr>
                <tr>
                    <th scope="row">Note</th>
                    <?php
                    foreach ($notes as $note):
                        ?>
                        <td><?=$note[1]?></td>
                    <?php endforeach;?>
                </tr>
            </table>
        </div>
        <?php }  ?>
</section>