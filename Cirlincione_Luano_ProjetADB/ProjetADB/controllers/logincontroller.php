<?php
//SESSION_START();
require($_SERVER['DOCUMENT_ROOT']."/ProjetADB/models/model.php");

 if(isset($_POST['btnlogin'])){
    //Si tous les champs sont remplis, on vérifie si les identifiants sont corrects
     if(!empty($_POST['username'])&& !empty($_POST['password'])){
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            //on appelle la fonction login() pour vérifier les identifiants
            login($username, $password);
            if(login($username, $password)==true){
                //Si les identifiants sont corrects, on crée des variables de session
                $_SESSION['auth'] = true;
                $_SESSION['id'] = getId($username);
                $_SESSION['username'] = $username;
                
                header('Location: accueil.php');
                exit;
            }else{
                $errorMsg = "Identifiant ou mot de passe incorrect.";
            }
        }else{
            $errorMsg = "Veuillez remplir tous les champs.";
        }
    }

?>