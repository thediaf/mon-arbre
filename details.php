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
            <h1 class="page-title">Arbre généalogique</h1>
        </header>
    
        <?php 

            require_once('model/FamilyManager.php');
            require_once('model/PersonManager.php');

            $personManager = new PersonManager();
            $familyManager = new FamilyManager();

            $family = $familyManager->getFamilyInfo($_GET['id']);
            //var_dump($family);
            $link = array(
                'self'      =>  'Moi-meme',
                'father'    =>  'Père',
                'mother'    =>  'Mère',
                'joint'     =>  'Conjoint(e)',
                'son'       =>  'Fils',
                'daughter'  =>  'Fille',
                'brother'   =>  'Frère'
            );
            if ($family){ 
                $txt = "<table class='table table-striped'><tr><th>Lien</th><th>Prénom</th>
                        <th>Nom</th><th>Date de naissance</th><th>Lieu de naissance</th>
                        <th>Description</th><th>Photo</th><th>Modifier</th><th>Supprimer</th></tr>";
                        $i = 0;
                foreach ($family As $member => $val){
                    $person = $personManager->getPers($family[$member]);
                    if ($member != 'id' AND $member != 'idUser' AND !is_int($member)){
                        if ($person){
                //  while () {
                            $id = $person['id'];
                            
                            $i++;
                            $txt .= "<tr>";
                            $txt .= "<td><a href='details.php?id=$id'>" . $link[$member] ."</a></td>";
                            $txt .= "<td>".$person['firstName']."</td>";
                            $txt .= "<td>".$person['lastName']."</td>";
                            $txt .= "<td>".$person['birthDay']."</td>";
                            $txt .= "<td>".$person['birthLocality']."</td>";
                            $txt .= "<td>".$person['description']."</td>";
                            $txt .= "<td> <img src=".$person['photo']." width='70' height='70' class='img1 img  img-responsive'></td>";
                            $txt .= "<td><a href='modifier.php?id=$id'><span class=\"fa fa-edit\"></span></a></td>";
                            $txt .= "<td><a href='supprimer.php?id=$id'><span class=\"fa fa-trash-o\"></span></a></td>";
                        }
                    }
                }
            echo $txt."</table>";
            }
            else{
                $id = $_GET['id'];
                ?>
                <div class="row col-md-offset-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title"> <span class="fa fa-info"></span></div>
                        </div>
                        <div class="panel-body">
                            <p class="text-center">Désolé cette personne n'a pas d'arbre.<br>
                            Veuillez <a href="detail.php?id=<?= $id ?>">cliquez ici</a> pour voir ces informations en détail <br> Si non 
                            retourner à <a href="index.php">la page de votre profil</a>. </p>
                        </div>
                    </div>		
			    </div>
                <?php
            }
        ?>
                    
    </div>	<!-- /container -->


<?php $content=ob_get_clean(); ?>
<?php require('template.php'); ?>
