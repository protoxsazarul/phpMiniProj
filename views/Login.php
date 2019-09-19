<?php
require_once "controllers/SPDO.php";

?>

<body>
<section id="main" class="container-fluid">
    <section class="d-flex justify-content-center align-items-center">
        <div class="col-6 mt-5">
         <p class="font-weight-bold">Identification</p>
            <form method="post">
                <div class="form-group">
                    <input name="login"type="Text" class="form-control" id="InputLogin" placeholder="Login">
                </div>
                <div class="form-group">
                    <input name="pass" type="password" class="form-control" id="InputPassword" placeholder="Mots de passe">
                </div>
                <button type="submit" class="btn btn-primary w-100">Connexion</button>
            </form>
        </div>
    </section>
</section>
<?php

if(isset($_POST['login']) AND isset($_POST['pass'])){

    $pdo = SPDO::getInstance();
    $login =  $pdo->login($_POST['login'],$_POST['pass']);
    $_SESSION['loged'] = $login[0];
    $_SESSION['user'] = $login[1];
}

?>
</body>
