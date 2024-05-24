<?php
//SESSION_START();
require($_SERVER['DOCUMENT_ROOT']."/ProjetADB/models/model.php");

 if(isset($_POST['btnsubscribe'])){
     if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password2'])){
         if($_POST['password'] == $_POST['password2']){
             $username = htmlspecialchars($_POST['username']);
             $email = htmlspecialchars($_POST['email']);
             //On crypte le mot de passe
             $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
             
             //On vérifie si l'utilisateur n'existe pas déjà.
             checkifUserAlreadyExist($username);
            //Si l'utilisateur n'existe pas, on l'ajoute à la base de données et on crée des variables de session.
             if(checkifUserAlreadyExist($username) == 0){
                 insertUser($username, $email, $password);
                 $_SESSION['auth'] = true;
                 $_SESSION['id'] = getId($username, $email);
                 $_SESSION['username'] = $username;
                 header('Location: accueil.php');
                 
             }else{
                 $errorMsg = "L'utilisateur existe déjà.";
             }
                
            }else{
             $errorMsg = "Les mots de passe ne correspondent pas.";
            }
        }else{
            $errorMsg = "Veuillez remplir tous les champs.";
        }
    }
?>