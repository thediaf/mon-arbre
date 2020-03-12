<?php
    session_start();     
?>
<?php $title='Mon album - Mon arbre' ?>

	<header id="heade"></header>

    <!-- container -->
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="index.php">    Accueil</a></li>
            <li class="active">Détail</li>
        </ol>
        <header class="page-header">
            <h1 class="page-title">Informations d'une personne</h1>
        </header>
			        
        <?php 

            require_once('model/PersonManager.php');

            $personManager = new PersonManager();

            $person = $personManager->getPers($_GET['id']);
                echo "<table class=\"table table-bordered\">";
                if ($person) {
                    echo "<tr><th>prenom</th><td>" . $person['firstName'] . "</td></tr>";
                    echo "<tr><th>nom</th><td>" . $person['lastName'] . "</td></tr>";
                    echo "<tr><th>login</th><td>" . $person['birthDay'] . "</td></tr>";
                    echo "<tr><th>adresse</th><td>" . $person['birthLocality'] . "</td></tr>";
                    echo "<tr><th>telephone</th><td>" . $person['description'] . "</td></tr>";
                    echo "<tr><th>photo</th><td><img class=\"img1  img  img-responsive\" src=\"" . $person['photo'] . "\"></td></tr>";
                }
                
            echo "</table>";
            
        ?>
                    
    </div>	<!-- /container -->


<?php $content=ob_get_clean(); ?>
<?php require('template.php'); ?>
