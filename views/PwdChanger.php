<section id="main" class="container-fluid">
    <section class="d-flex justify-content-center align-items-center">
        <div class="col-6 mt-5">
            <p class="font-weight-bold">Identification</p>
            <?php
            if($error == true){
                ?>
                <div class="bg-danger text-white col-5"><p>Mauvais Login / mot de passe</p></div>
            <?php } ?>
            <form method="post">
                <div class="form-group">
                    <input name="login" type="Text" class="form-control" id="InputLogin" placeholder="Login">
                </div>
                <div class="form-group">
                    <input name="pass" type="password" class="form-control" id="InputPassword" placeholder="Mot de passe actuel">
                </div>
                <div class="form-group">
                    <input name="Newpass" type="password" class="form-control" id="InputNewPassword" placeholder="Nouveau mot de passe">
                </div>
                <div class="form-group">
                    <input name="Confpass" type="password" class="form-control" id="InputConfPassword" placeholder="Nouveau mot de passe">
                </div>
                <button type="submit" class="btn btn-primary w-100" name="confirmBtn" value="confirm">Confirm</button>
                <button type="submit" class="btn btn-warning w-100 mt-1" name="cancelBtn"value="cancel">cancel</button>
            </form>
        </div>
    </section>
</section>