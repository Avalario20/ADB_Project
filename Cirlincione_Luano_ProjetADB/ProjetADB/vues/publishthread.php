<?php
include('../entete.php');
require($_SERVER['DOCUMENT_ROOT']."/ProjetADB/controllers/publishcontroller.php");
?>
<Form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="POST">
<div class = "formpublish">
    <label class="titrequestion">Titre de la question</label>
    <input type="text" name="titrequestion" id="titrequestion" autofocus>
    <label class = "titredesc">Description de la question</label>
    <textarea name="descquestion" id="descquestion"></textarea> 
    <label class = "titrecontenu">Contenu de la question</label>
    <textarea name="question" id="question"></textarea>
    <label class="errormsg"><?php if(isset($errorMsg)){echo $errorMsg;}?></label>
    <input type="submit" name="btnpublish" id="btnpublish" value="Publier">
</div>
</Form>

<?php
include('../footer.php');
?>
