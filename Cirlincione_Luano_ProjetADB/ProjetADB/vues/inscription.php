<?php
include('../entete.php');
require($_SERVER['DOCUMENT_ROOT']."/ProjetADB/controllers/signupcontroller.php"); 
?>
<Form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="POST">

<div class = "formsubscribe">
   
    <label class="username">Identifiant</label>
    <input type="text" name="username" id="username" required autofocus>
    <label class="email">Email</label>
    <input type="email" name="email" id="email" required>
    <label class = "passwordI">Mot de passe</label>
    <input type="password" name="password" id="password" required>
    <label class = "password">Confirmer le mot de passe</label>
    <input type="password" name="password2" id="password2" required>
    <label class ="golog">Déjà inscrit ? <a class= "logorsinup" href="connexion.php">Connectez-vous</a></label>
    <label class="errormsg"><?php if(isset($errorMsg)){echo $errorMsg;}?></label>
    <input type="submit" name="btnsubscribe" id="submitlog" value="Envoyer">
</div>
</Form>

<?php
include('../footer.php');
?>