<?php
include('../entete.php');
require($_SERVER['DOCUMENT_ROOT']."/ProjetADB/controllers/getinfoofquestion.php");
require($_SERVER['DOCUMENT_ROOT']."/ProjetADB/controllers/editquestioncontroller.php");

if(isset($question_question)){
?>
<Form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="POST">
<div class = "formpublish">
    <input type="hidden" name="idofquestion" value="<?php echo $idofquestion; ?>">
    <label class="titrequestion">Titre de la question</label>
    <input type="text" name="titrequestion" id="titrequestion" value="<?php echo $question_titre?>">

    <label class = "titredesc">Description de la question</label>
    <textarea name="descquestion" id="descquestion"><?php echo $question_description?></textarea> 

    <label class = "titrecontenu">Contenu de la question</label>
    <textarea name="question" id="question"><?php echo $question_question?></textarea>

    <label class="errormsg">
        <?php if(isset($errorMsg)){echo $errorMsg;}?>
    </label>

    <input type="submit" name="btnedit" id="btnpublish" value="Modifier"> 
</div>
</Form>

<?php
}
include('../footer.php');
?>