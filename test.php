<?php
	session_start();
	$title='Profil - Mon arbre'; 
?>

	<header id="heade"></header>

	<!-- container -->
	<div class="container tree">
		<ol class="breadcrumb">
			<li>Accueil</li>
			<li class="active">Profil</li>
		</ol>

		<div class="row">
			<a href="signout.php" class="btn btn-default pull-right" role="button">Se déconnecter</a>
		</div>
		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
				<h4 class="thin">Bienvenue sur le gestionnaire d'arbres généalogiques</h4>
				<br><p>Profitez des services que vous offre ce site de gestion d'arbres généalogiques</p>
				<ul>
					<li>Créer son arbre généalogique</li>
					<li>Mettre ses informations à jour</li>
					<li>Ajouter une personne à son arbre</li>
					<li>Chercher des informations sur une personne</li>
					<li>Faire un album de photos</li>
				</ul>
			</div>
		</div>

		<div class="row">
			<p>
				<a href="search.php" class="btn btn-info" role="button">Faire une recherche</a> 
				<a href="trees.php" class="btn btn-success" role="button">Mon arbre</a>
				<a href="picts.php" class="btn btn-danger" role="button">Mon album photos</a>
				<?php 
					require_once('model/UserManager.php');
					$userManager = new UserManager();

					$user = $userManager->getAdmin($_SESSION['idUser']);
					if ($user['admin'] == 1){
				?>
						<a href="admin.php" class="btn btn-primary" role="button">Page d'administration</a>
					<?php } ?>
					</p>
		</div>
	</div>	<!-- /container -->
	

<?php $content=ob_get_clean(); ?>
<?php require('template.php'); ?>







































