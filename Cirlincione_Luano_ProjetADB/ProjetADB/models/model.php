<?php
require($_SERVER['DOCUMENT_ROOT']."/ProjetADB/models/dbconnect.php");
function checkifUserAlreadyExist($username){
    global $bdd;
    $sqlquery = "SELECT username FROM users WHERE username = :username";
    $stmtUsers = $bdd->prepare($sqlquery);
    $stmtUsers->bindParam(':username', $username);
    $stmtUsers->execute();
    if($stmtUsers->rowCount() > 0){
        return true;
    }else{
        return false;
    }
}
function insertUser($username,$email,$password){
    //Récupération de la connexion à la BDD
    global $bdd;
    $role = 0;
    //Requete SQL
    $stmtUsers = $bdd->prepare("INSERT INTO users (username, email, password, admin) VALUES (:username, :email, :password, :role)");
    //Bind des paramètres
    $stmtUsers->bindParam(':username', $username);
    $stmtUsers->bindParam(':email', $email);
    $stmtUsers->bindParam(':password', $password);
    $stmtUsers->bindParam(':role', $role);
    try{
        $stmtUsers->execute();
    }catch(PDOException $e){
        $errorMsg = "Une erreur s'est produite.";
    }
    if(isset($errorMsg)){
        return $errorMsg;
    }
}
function getId($username) {
    global $bdd;
    $sqlLastUser = "SELECT id_user FROM users WHERE username = :username";
    $stmtUsers = $bdd->prepare($sqlLastUser);
    $stmtUsers->bindParam(':username', $username);
    $stmtUsers->execute();
    
    // Récupérer une seule ligne
    $idUser = $stmtUsers->fetch(PDO::FETCH_ASSOC);
    
    if ($idUser) {
        // Retourner id_user casté en entier
        return (int) $idUser['id_user'];
    } else {
        // Retourner null si aucun utilisateur n'est trouvé
        return null;
    }
}
function login($username, $password){
    global $bdd;
    $checkifUserExist= $bdd->prepare("SELECT * FROM users WHERE username = :username");
    $checkifUserExist->bindParam(':username', $username);
    $checkifUserExist->execute();
    if($checkifUserExist->rowCount() > 0){
        $usersinfo = $checkifUserExist->fetch();
        if(password_verify($password, $usersinfo['password'])){
            return true;
        }else{
            $errorMsg = "Mot de passe incorrect.";
        }
    }else{
        $errorMsg = "Identifiant incorrect.";
    }
}
function insertQuestion($question_titre, $question_desc, $question, $question_iduser, $question_username, $question_date){
    global $bdd;
    $stmtQuestion = $bdd->prepare("INSERT INTO sujet (titre, description, message, date_message, username_auteur, id_user) VALUES (:question_titre, :question_desc, :question, :question_date, :question_username, :question_iduser)");
    $stmtQuestion->bindParam(':question_titre', $question_titre);
    $stmtQuestion->bindParam(':question_desc', $question_desc);
    $stmtQuestion->bindParam(':question', $question);
    $stmtQuestion->bindParam(':question_date', $question_date);
    $stmtQuestion->bindParam(':question_username', $question_username);
    $stmtQuestion->bindParam(':question_iduser', $question_iduser);
    try{
        $stmtQuestion->execute();
    }catch(PDOException $e){
        $errorMsg = "Une erreur s'est produite.";
    }
    if(isset($errorMsg)){
        return $errorMsg;
    }
}
function getAllQuestionsUser($idUser, $username){
    global $bdd;
    $stmtQuestion = $bdd->prepare("SELECT * FROM sujet WHERE id_user = :idUser OR username_auteur = :username ORDER BY id_sujet DESC");
    $stmtQuestion->bindParam(':idUser', $idUser);
    $stmtQuestion->bindParam(':username', $username);
    try {
        $stmtQuestion->execute();
        return $stmtQuestion->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        return "Une erreur s'est produite : " . $e->getMessage();
    }
}
function updateQuestion($question_titre, $question_desc, $question, $question_id){
    global $bdd;
    $stmtQuestion = $bdd->prepare("UPDATE sujet SET titre = :question_titre, description = :question_desc, message = :question WHERE id_sujet = :question_id");
    $stmtQuestion->bindParam(':question_titre', $question_titre);
    $stmtQuestion->bindParam(':question_desc', $question_desc);
    $stmtQuestion->bindParam(':question', $question);
    $stmtQuestion->bindParam(':question_id', $question_id);
    try{
        $stmtQuestion->execute();
    }catch(PDOException $e){
        $errorMsg = "Une erreur s'est produite.";
    }
    if(isset($errorMsg)){
        return $errorMsg;
    }
}
function getAllQuestionsOfAllUsers(){
    global $bdd;
    $stmtQuestion = $bdd->prepare("SELECT * FROM sujet ORDER BY id_sujet DESC");
    try {
        $stmtQuestion->execute();
        return $stmtQuestion->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        return "Une erreur s'est produite : " . $e->getMessage();
    }
}
function deleteQuestion($idQuestion){
    global $bdd;
    $stmtQuestion = $bdd->prepare("DELETE FROM sujet WHERE id_sujet = :idQuestion");
    $stmtQuestion->bindParam(':idQuestion', $idQuestion);
    try{
        $stmtQuestion->execute();
    }catch(PDOException $e){
        $errorMsg = "Une erreur s'est produite.";
    }
    if(isset($errorMsg)){
        return $errorMsg;
    }
}
?>