<?php
//session_start();
//require('../models/model.php');
require($_SERVER['DOCUMENT_ROOT']."/ProjetADB/models/dbconnect.php");

//On recupere l'id de la question pour laquelle on veut modifier les infos, 
//on vérifie que l'utilisateur est bien l'auteur de la question.
if(isset($_GET['id']) &&!empty($_GET['id'])){
    $idofquestion = $_GET['id'];
    // si c'est le cas on recupere les infos de la question dans la base de données.
    
    global $bdd;
    $checkifQuestionExists = $bdd->prepare('SELECT * FROM sujet WHERE id_sujet = :id');
    $checkifQuestionExists->bindParam(':id', $idofquestion);
    $checkifQuestionExists->execute();

    if($checkifQuestionExists->rowCount() > 0){
        $questionInfos = $checkifQuestionExists->fetch();
        
        if($questionInfos['id_user'] == $_SESSION['id']){

            $question_titre = $questionInfos['titre'];
            $question_description = $questionInfos['description'];
            $question_question = $questionInfos['message'];

            $question_description = str_replace("<br />", '', $question_description);
            $question_question = str_replace("<br />", '', $question_question);

        }else{
            $errorMsg = "Vous n'etes pas l'auteur de cette question.";
        }

    }else{
        $errorMsg = "Erreur lors de la récupération de la question";
    }
}else{
    $errorMsg = "Erreur lors de la récupération de la question";
}

?>