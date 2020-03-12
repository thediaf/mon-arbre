<?php $title = 'A propos - Mon arbre'; ?>
<?php ob_start();?>

	<header id="heade"></header>

	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">A propos</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-sm-8 maincontent">
				<header class="page-header">
					<h1 class="page-title">A propos de l'appliction</h1>
				</header>
				<p><img src="assets/images/images.jpeg" alt="" class="img-rounded pull-right" width="300" >
				 <strong>Mon arbre</strong> est une application web contenant une base de données stockant 
				 des arbres généalogiques permettant de représenter 
				les relations parentales entre des personnes.</p>
				<p>L’application permet de :</p>
				<ul>
					<li>Créer son arbre généalogique</li>
					<li>Mettre ses informations à jour</li>
					<li>Ajouter une personne à son arbre</li>
					<li>Chercher des informations sur une personne</li>
					<li>Avoir un album de photos</li>
				</ul>
			</article>
			<!-- /Article -->
			
			<!-- Sidebar -->
			<aside class="col-sm-4 sidebar sidebar-right">

				<div class="widget">
					<h4>Adresse</h4>
					<address>
						29M Campus social, Université Gaston Berger à Saint-Louis
					</address>
					<h4>Téléphone:</h4>
					<address>
						(+221) 77 856 17 10
					</address>
				</div>
			</aside>
			<!-- /Sidebar -->

		</div>
	</div>	<!-- /container -->
	

<?php $content=ob_get_clean(); ?>
<?php require('template.php'); ?>