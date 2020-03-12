<?php $title='Mon album - Mon arbre' ?>

	<header id="heade"></header>

    <!-- container -->
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="index.php">    Accueil</a></li>
            <li class="active">Modifier</li>
        </ol>

        <header class="page-header">
            <h1 class="page-title">Modification des informations d'un individu</h1>
        </header>

<?php
     require_once('model/PersonManager.php');

     $personManager = new PersonManager();

     if (isset($_GET['id'])){
        $person = $personManager->getPers($_GET['id']);
        $id = $_GET['id'];
echo $id . '<br>';
     }
     if (isset($_POST['firstName']))
     {
        $personManager = new PersonManager();
      
        $filename = $_FILES['profile_photo']['name'];
        $filetmpname = $_FILES['profile_photo']['tmp_name'];
        $folder = '../assets/images/';
        $filename = ($filename) ? $filename : 'photo.png';
        $filename = $folder.$filename;
        move_uploaded_file($filetmpname, $filename);
        
        $personManager->updatePerson($_GET['id'], $_POST['firstName'], $_POST['lastName'], $_POST['birthDay'], $_POST['birthLocality'], $_POST['description'], $filename);
        
        if ($_GET['sv'] == 'tree')
             header("Location: ../trees.php");
         else
             header("Location: ../admin.php");
     }
?>
<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
                            
                        <form method="post" action="" enctype="multipart/form-data">
                            
                            <div class="top-margin">
                                <div id="profile-container">
                                    <img src="<?= $person['photo']?>" alt="Photo de profil" align="center" id="profileImage">
                                </div>
                                <input type="file" id="imageUpload" name="profile_photo" placeholder="Photo" capture>
                            </div>
                            
                            <div class="top-margin">
                                <input type="text" id="inputP" value="<?= $person['firstName']?>" placeholder="Prenom" name="firstName" class="form-control">
                                <input type="text" id="inputP" value="<?= $person['lastName']?>" placeholder="Nom" name="lastName" class="form-control">
                            </div>

                            <div class="top-margin">
                                
                                <input type="date" id="inputP" value="<?= $person['birthDay']?>" placeholder="Date de naissance" name="birthDay" class="form-control">
                                <!--input type="text" placeholder="Date de naissance" name="birthDay" class="form-control"-->
                                <input type="text" id="inputP" value="<?= $person['birthLocality']?>" placeholder="Lieu de naissance" name="birthLocality" class="form-control">
                            </div>
                            
                            <div class="top-margin">
                                    <!--input type="text" id="inputP" placeholder="Qui est-ce" name="sex" class="form-control"-->
                                
                                <input type="text" id="inputP" value="<?= $person['description']?>" placeholder="Déscription" name="description" class="form-control">
                            </div><hr>

                            <div class="top-margin">
                                <button class="btn btnSubmit" name="tst" type="submit"><span class="fa fa-edit"></span> Modifier</button>
                            </div>
                        </form> 
						</div>
					</div>

				</div>
	
    </div>	<!-- /container -->

<?php $content=ob_get_clean(); ?>
<?php require('template.php'); ?>
