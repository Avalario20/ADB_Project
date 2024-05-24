<?php
//SESSION_START();
require($_SERVER['DOCUMENT_ROOT']."/ProjetADB/models/model.php");
//on vérifie si les champs ne sont pas vides
if(isset($_POST['btnpublish'])){
    if(!empty($_POST['titrequestion']) &&!empty($_POST['descquestion']) &&!empty($_POST['question'])){
        //on récupère les valeurs des champs
        $question_titre = htmlspecialchars($_POST['titrequestion']);
        $question_desc = nl2br(htmlspecialchars($_POST['descquestion']));
        $question = nl2br(htmlspecialchars($_POST['question']));
        $question_username = $_SESSION['username'];
        $question_iduser = $_SESSION['id'];
        //var_dump($question_iduser);
        $question_date = date('d-m-y H:i:s');
        //on insère la question dans la base de données
        insertQuestion($question_titre, $question_desc, $question, $question_iduser,$question_username, $question_date);
        
        //$errorMsg = "Votre question a bien été publiée";
        header('Location: userquestion.php');
    }else{
        $errorMsg = "Veuillez remplir tous les champs";}
}
?>