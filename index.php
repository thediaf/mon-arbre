<?php
    session_start();
?>
<?php $title='Mon arbre'; ?>
<?php 


if (!isset($_SESSION['login']) || !isset($_SESSION['pwd'])){ ?>

			<header id="head">
				<div class="container">
					<div class="row">
						<h1 class="lead">ARBRE GENEALOGIQUE</h1>
						<p class="tagline text-success">Le plus beau des cadeaux que la vie m'a offerte c'est ma famille</p>
						<p><a href="signup.php" class="btn btn-success btn-lg" role="button">S'inscrire</a> 
						<a href="signin.php" class="btn btn-info btn-lg" role="button">Se connecter</a></p>
					</div>
				</div>
			</header> <!-- /Header -->

			<!-- Intro -->
			<div class="container text-center">
				<br> <br>
				<h2 class="thin">Shoghi Effendi,<br> Appel aux Nations, édition baha'ies</h2>
				<p class="text-muted">
					Tous les membres de la famille humaine, peuples et gouvernements, villes et villages, 
					sont devenus de plus en plus interdépendants; il n'est plus loisible à aucun d'entre eux 
					de s'isoler avec la prétention de pouvoir se suffire à lui-même... C'est pourquoi en cette 
					époque l'unité de l'humanité peut être réalisée.
				</p>
			</div>
			<!-- /Intro-->
				


				<?php } 
		else
		{
			header('Location: test.php');
		}?>


			</div>	<!-- /container -->
			

<?php $content=ob_get_clean(); ?>
<?php require('template.php'); ?>