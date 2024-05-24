<?php
//session_start();
require($_SERVER['DOCUMENT_ROOT']."/ProjetADB/models/model.php");
require('../controllers/getinfoofquestion.php');

//Une fois que l'utilisateur clique sur le bouton modifier, on vérifie si les champs sont remplis, 
//On les recupère dans des variables.

if(isset($_POST['btnedit'])){
    if(!empty($_POST['titrequestion']) &&!empty($_POST['descquestion']) &&!empty($_POST['question'])&&!empty($_POST['idofquestion'])){
        $new_titrequestion = htmlspecialchars($_POST['titrequestion']);
        $new_descquestion = nl2br(htmlspecialchars($_POST['descquestion']));
        $new_question = nl2br(htmlspecialchars($_POST['question']));
        $idofquestion = intval($_POST['idofquestion']);

        //On les envoie à la fonction updateQuestion() pour mettre à jour la question dans la base de données.
        
        updateQuestion($new_titrequestion, $new_descquestion, $new_question, $idofquestion);

        header('Location: ../vues/userquestion.php');

    }else{
        $errorMsg = "Veuillez remplir tous les champs";
    }
}
?>