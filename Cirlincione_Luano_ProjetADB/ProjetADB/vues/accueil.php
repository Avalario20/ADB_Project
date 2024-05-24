<?php
include('../entete.php');
require($_SERVER['DOCUMENT_ROOT']."/ProjetADB/models/model.php");
//SESSION_START();
if(!isset($_SESSION['auth'])){
    header('Location: connexion.php');
    exit;
}

?>
<div class="main">
    <div class="threads">
        <ul class="threadcontent">
            <?php
            $questions = getAllQuestionsOfAllUsers();
            // Vérifier que la fonction a retourné un tableau
            if (is_array($questions)) { 
                foreach ($questions as $question) {
                    ?>
                    <li>
                        <div class="infoquestion">
                            <h4><?php echo $question['username_auteur']; ?></h4>
                            <h5>Le: <?php echo $question['date_message'];?></h5>
                        </div>
                        <h2>
                            <?php echo $question['titre']; ?>
                        </h2>
                        <p>
                            <?php echo $question['description']; ?>
                        </p>
                        <p>
                            <?php echo $question['message']; ?>
                        </p>
                        <!--<div class="nav">
                        <a href="editquestion.php" class="btnnav">Modifer</a>
                        <a href="" class="btnnav">Supprimer</a>
                        </div>-->
                    </li>
                    <?php
                }
            }
            ?>
        </ul>
    </div>
</div>
<?php
include('../footer.php');
?>