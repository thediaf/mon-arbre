<?php
    session_start();
?>
<?php $title = 'Connexion - Mon arbre'?>

	<header id="heade"></header>

	<!-- container -->
	<div class="container tree">

		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Se connecter</li>
		</ol>

		<?php if (!isset($_SESSION['login']) || !isset($_SESSION['pwd'])){ ?>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Connexion</h1>
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Connectez-vous à votre compte</h3>
							<p class="text-center text-muted">Veuillez vous <a href="signup.php">inscrire</a> si vous n'avez pas de compte</p>
							<hr>
							
							<form method="post" action="controller/frontend.php?action=connect">
								<div class="top-margin">
								<b style="font-size:15px; margin:25px;" class="alert alert-danger">
									<?php if(isset($_REQUEST["msg"]))
										echo $_REQUEST["msg"];
									?>
								</b></div>
								<div class="top-margin">
									<em class="fa fa-user icon"></em>
                                	<input type="text" placeholder="Pseudo" name="login" class="form-control">
								</div>
								<div class="top-margin">
									<em class="fa fa-key icon"></em>
                                	<input type="password" placeholder="Mot de passe" name="passWord" class="form-control">
                                </div>
								
								<hr>
								
								<div class="row">
                                    <div class="col-lg-offset-4 col-lg-4 text-right">
                                    <button class="btn btnSubmit" type="submit">Se connecter</button></div>
								</div>
							</form>
						</div>
					</div>

				</div>
				
			</article>
			<!-- /Article -->

		</div>

		<?php } 
		else
		{
		?>
			<div class="row col-md-offset-3 col-md-6">
				<div class="panel panel-warning">
					<div class="panel-heading">
						<div class="panel-title"> <span class="fa fa-warning"></span> Avertissement</div>
					</div>
					<div class="panel-body">
						<p class="text-center">Vous etes déjà connectés, voudrez-vous créer un nouveau compte.<br>
						Si oui, veuillez vous <a href="signout.php">déconnecter</a> puis revenez ici <br> Si non 
						retournew vers <a href="test.php">la page de votre profil</a>. </p>
					</div>
				</div>		
			</div>
		<?php	
		}?>

	</div>	<!-- /container -->
	

<?php $content=ob_get_clean(); ?>
<?php require('template.php'); ?>