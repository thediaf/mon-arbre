<?php
    session_start();     
?>
<?php $title='Mon album - Mon arbre' ?>

	<header id="heade"></header>

    <!-- container -->
    <div class="container tree">
        <ol class="breadcrumb">
            <li><a href="index.php">    Accueil</a></li>
            <li class="active">Photo</li>
        </ol>

        <header class="page-header">
            <h1 class="page-title">Mes photos</h1>
        </header>


        <div class="row pictAdd">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <form method="post" action="controller/frontend.php?action=newPict" enctype="multipart/form-data">
                    <div class="top-margin">
                        <div id="profile-container">
                            <img src="../assets/images/photo.png" alt="Photo de profil" width="100" height="100" id="profileImage">
                        </div>
                        <input type="file" id="imageUpload" name="profile_photo" placeholder="Photo" capture>
                    </div>

                    <div class="top-margin">
                        <button class="btn btn-info btnSearch" type="submit"><span class="fa fa-plus-circle"></span> Ajouter</button>
                    </div>
                </form>
            </div>
        </div>


        <?php
            require_once('model/PictManager.php');
    
            $pictManager = new PictManager();

            $picts = $pictManager->getPicts($_SESSION['idUser']);
            if ($data = $picts->fetch()){
                echo '<div class="row">';
                do
                {
                    ?>
                    <div class="col-xs-4 col-sm-3 col-md-2">
                        <a href="<?= htmlspecialchars($data['image'])?>" class="linkPict" title="Afficher l'image">
                        <img src="<?= htmlspecialchars($data['image'])?>" alt="" class="img-rounded">
                    </div>
                <?php } while ($data = $picts->fetch());?>
                    <div id="overlay"></div>
                </div>
                <?php    
            }
            
        ?>

        
    </div>



<?php $content=ob_get_clean(); ?>
<?php require('template.php'); ?>
