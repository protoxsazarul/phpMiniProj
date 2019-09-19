<?php


$usersList = SPDO::getInstance()->getAllUser();
if(isset($_GET['inputUser'])){
    $selectedModUser = SPDO::getInstance()->getUser($_GET['inputUser']);
    var_dump($selectedModUser);
}
//var_dump($usersList);
?>
<div>
    <form method="get">
        <div class="form-group col-md-4">
            <label for="inputUser">User</label>
            <select id="inputUser"  name="inputUser" class="form-control">
               <?php
               var_dump($selectedModUser);
               foreach($usersList as $user):
               ?>
                   <option value="<?=$user[0]?>"> <?= $user[2]." ".$user[3] ?></option>
                <?php endforeach;
                ?>
            </select>
            <button id="modUserBtn"  name="menu" value="ModUser" type="submit" class="btn btn-primary w-100" >Valider</button>
        </div>
    </form>
</div>

    <section id="ModUserForm" class="container-fluid">
        <section class="d-flex justify-content-center align-items-center">
            <div class="col-6 mt-5">
                <p class="font-weight-bold">Modification</p>
                <form method="post">
                    <div class="form-group">
                        <input name="ModUserlastName" type="Text" class="form-control" id="ModUserlastName" placeholder="lastName" value="<?php if (isset($selectedModUser)){echo $selectedModUser[0];}?>">
                    </div>
                    <div class="form-group">
                        <input name="ModUserfirstName" type="Text" class="form-control" id="ModUserfirstName" placeholder="firstName" value="<?php if (isset($selectedModUser)){echo $selectedModUser[1];}?>">
                    </div>
                    <div class="form-group">
                        <input name="ModUserPass" type="password" class="form-control" id="ModUserPassword" placeholder="Mots de passe">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="addUseSection">section</label>

                        <select id="addUseSection"  name="addUseSection" class="form-control">
                            <?php
                            if(isset($selectedModUser)){

                                $restrictSections = SPDO::getInstance()->getSection($selectedModUser[2]);
                                $sectionsUser = SPDO::getInstance()->getUserSection($selectedModUser[2]);

                                 foreach ($sectionsUser as $sectionUser ):

                                     ?>

                                <option value="<?=$sectionUser[0]?>"><?= $sectionUser[1]?></option>
                                <?php
                                 endforeach;
                                foreach($restrictSections as $section):
                                    ?>
                                    <option value="<?=$section[0]?>"> <?= $section[1]?></option>
                                    <?php
                                endforeach;

                                ?><?php
                            } else {
                                foreach($sections as $section):
                              ?>
                                <option value="<?=$section[0]?>"> <?= $section[1]?></option>
                            <?php
                            endforeach;
                            }

                            ?>
                        </select>
                        <p>Role</p>
                        <div class="form-check form-check-inline">

                            <input class="form-check-input" type="radio" name="ModUserRole" id="role1" value="0" checked>
                            <label class="form-check-label" for="role1">
                                0
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ModUserRole" id="role2" value="1">
                            <label class="form-check-label" for="role2">
                                1
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Connexion</button>
                </form>
            </div>
        </section>
    </section>
