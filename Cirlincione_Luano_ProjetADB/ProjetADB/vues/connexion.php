<?php
include('../entete.php');
require($_SERVER['DOCUMENT_ROOT']."/ProjetADB/controllers/logincontroller.php");
?>
<Form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="POST">
<div class = "formlogin">
    
    <label class="username">Identifiant</label>
    <input type="text" name="username" id="username" required autofocus>
    <label class = "password">Mot de passe</label>
    <input type="password" name="password" id="password" required>
    <label class ="golog">Pas encore inscrit ? <a class ="logorsinup" href="inscription.php">Inscrivez-vous</a></label>
    <label class="errormsg"><?php if(isset($errorMsg)){echo $errorMsg;}?></label>
    <input type="submit" name="btnlogin" id="submitlog" value="Connexion">
</div>
</Form>

<?php
include('../footer.php');
?>
