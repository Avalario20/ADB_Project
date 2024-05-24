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
            $questions = getAllQuestionsUser($_SESSION['id'], $_SESSION['username']);
            // Vérifier que la fonction a retourné un tableau
            if (is_array($questions)) { 
                foreach ($questions as $question) {
                    ?>
                    <li>
                        <h2>
                            <?php echo $question['titre']; ?>
                        </h2>
                        <p>
                            <?php echo $question['description']; ?>
                        </p>
                        <p>
                            <?php echo $question['message']; ?>
                        </p>
                        <div class="nav">
                        <a href="editquestion.php?id=<?= $question['id_sujet'];?>" class="btnnavedit">Modifer</a>
                        <a href="../controllers/deletequestioncontroller.php?id=<?= $question['id_sujet'];?>" class="btnnavsupp">Supprimer</a>
                        </div>
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