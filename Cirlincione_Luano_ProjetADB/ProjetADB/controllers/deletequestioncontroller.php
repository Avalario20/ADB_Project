<?php
session_start();
if($_SESSION['auth'] == false){
    header('Location: ../vues/connexion.php');
}else{
require($_SERVER['DOCUMENT_ROOT']."/ProjetADB/models/model.php");

if(isset($_GET['id']) &&!empty($_GET['id'])){
    $idofquestion = $_GET['id'];

    $checkifQuestionExists = $bdd->prepare('SELECT * FROM sujet WHERE id_sujet = :id');
    $checkifQuestionExists->bindParam(':id', $idofquestion);
    $checkifQuestionExists->execute();

    if($checkifQuestionExists->rowCount() > 0){
        $questionInfos = $checkifQuestionExists->fetch();
        if($questionInfos['id_user'] == $_SESSION['id']){

            deleteQuestion($idofquestion);
            header('Location:../vues/userquestion.php');

        }else{
            $errorMsg = "Vous n'avez pas le droit de supprimer cette question.";
        }

        }else{
            $errorMsg = "Aucune question n'a été trouvée";
        }
    

    }else{
        $errorMsg = "Aucune question n'a été trouvée";
    }
}
?>