<?php
$sections = SPDO::getInstance()->getSection("none");
require_once 'controllers/ControllerAddUser.php';
?>
<section id="addUserForm" class="container-fluid">
    <section class="d-flex justify-content-center align-items-center">
        <div class="col-6 mt-5">
            <p class="font-weight-bold">Création</p>
            <form   method="post">
                <div class="form-group">
                    <input name="addUserLastName" type="Text" class="form-control" id="addUserLastName" placeholder="lastName">
                </div>
                <div class="form-group">
                    <input name="addUserFirstName" type="Text" class="form-control" id="addUserFirstName" placeholder="firstName">
                </div>
                <div class="form-group">
                    <input name="addUserPass" type="password" class="form-control" id="addUserPassword" placeholder="Mots de passe">
                </div>
                <div class="form-group col-md-4">
                    <label for="addUserSection">section</label>
                    <select id="addUserSection"  name="addUserSection" class="form-control">
                        <?php
                        foreach($sections as $section):
                            ?>
                            <option value="<?=$section[0]?>"> <?= $section[1]?></option>
                        <?php endforeach;
                        ?>
                    </select>
                    <p>Role</p>
                    <div class="form-check form-check-inline">

                        <input class="form-check-input" type="radio" name="addUserRole" id="addUserrole1" value="0" checked>
                        <label class="form-check-label" for="addUserRole1">
                            0
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="addUserRole" id="addUserrole2" value="1">
                        <label class="form-check-label" for="addUserRole2">
                            1
                        </label>
                    </div>
                </div>
                <button name="newUser"  value="addUserValidate" type="submit" class="btn btn-primary w-100">Créer</button>
            </form>
        </div>
        <?php var_dump($_POST); ?>
    </section>
</section>