<?php $title='Mon arbre'; ?>


<?php ob_start(); ?>	
<header id="heade"></header>
	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index.html">Accueil</a></li>
			<li class="active">Contact</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-sm-9 maincontent">
				<header class="page-header">
					<h1 class="page-title">Contactez nous</h1>
				</header>
				<h4><span class="label label-default">Si vous voulez me laisser un message</span> </h4>
				
				<br>
					<form>
					
					<div class="row">
							<div class="top-margin col-sm-6">
								<input class="form-control" type="text" placeholder="Nom">
							</div>
							<div class="top-margin col-sm-6">
								<input class="form-control" type="text" placeholder="Email">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12">
								<textarea placeholder="Type your message here..." class="form-control" rows="9"></textarea>
							</div>
						</div>
						<br>
						<div class="row">
							
							<div class="col-sm-6 text-center">
							<button class="btn btn-info" type="submit"><span class="fa fa-check-circle"></span>   Envoyer</button>
							</div>
						</div>
					</form>

			</article>
			<!-- /Article -->
			
			<!-- Sidebar -->
			<aside class="col-sm-3 sidebar sidebar-right">

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