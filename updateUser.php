<?php $title='Mon album - Mon arbre' ?>

	<header id="heade"></header>

    <!-- container -->
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="index.php">    Accueil</a></li>
            <li class="active">Modifier</li>
        </ol>

        <header class="page-header">
            <h1 class="page-title">Modification des informations d'un utilisateur</h1>
        </header>

<?php
     require_once('model/UserManager.php');

     $userManager = new UserManager();

     if (isset($_GET['id'])){
        $user = $userManager->getAdmin($_GET['id']);
        $id = $_GET['id'];
//echo $id . '<br>';
     }
     if (isset($_POST['firstName']))
     {
        $userManager->updateUser($_GET['id'], $_POST['firstName'], $_POST['lastName'], $_POST['login'], $_POST['admin']); 
        header("Location: ../admin.php");
     }
?>
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
                            
                        <form method="post" action="">
                                
                            <div class="top-margin">
                                <input type="text" id="inputP" value="<?= $user['firstName']?>" placeholder="Prenom" name="firstName" class="form-control">
                                <input type="text" id="inputP" value="<?= $user['lastName']?>" placeholder="Nom" name="lastName" class="form-control">
                            </div>

                            <div class="top-margin">
                                
                                <input type="text" id="inputP" value="<?= $user['login']?>" placeholder="Login" name="login" class="form-control">
                                <input type="text" id="inputP" value="<?= $user['admin']?>" placeholder="Admin" name="admin" class="form-control">
                            </div>
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
