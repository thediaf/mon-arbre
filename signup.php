<?php $title='Inscription - Mon arbre' ?>

<header id="heade"></header>

	<!-- container -->
	<div class="container tree">

		
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Inscription</li>
		</ol>
		<?php if (!isset($_SESSION['login']) || !isset($_SESSION['pwd'])){ ?>
		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Inscription</h1>
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <h3 class="thin text-center">Créer un nouveau compte</h3>
							<p class="text-center text-muted">Veuillez vous <a href="signin.php">connecter</a> à votre compte, si vous en avez déja. </p>
							<hr>
							<b style="font-size:12px; margin : 25px;" class="text-danger">
									<?php if(isset($_REQUEST["msg"]))
										echo $_REQUEST["msg"];
									?>
							</b>
							<form method="post" action="controller/frontend.php?action=new">
								<div class="top-margin">
                                    <em class="fa fa-user icon"></em>
                                	<input type="text" placeholder="Prenom" name="firstName" class="form-control">
								</div>
								<div class="top-margin">
									<em class="fa fa-user icon"></em>
                                	<input type="text" placeholder="Nom" name="lastName" class="form-control">
								</div>
                                <div class="top-margin">
									<em class="fa fa-user icon"></em>
                                	<input type="text" placeholder="Pseudo" name="login" class="form-control">
								</div>
								<div class="top-margin">
									<em class="fa fa-key icon"></em>
                                	<input type="password" placeholder="Mot de passe" name="passWord" class="form-control">
                                </div>
                                <div class="top-margin">
                                    <em class="fa fa-key icon"></em>
                                	<input type="password" placeholder="Confirmer le mot de passe" name="pwd" class="form-control">
								</div>
								<hr>

								<div class="row">
                                    <div class="col-lg-offset-4 col-lg-4 text-right">
                                    <button class="btn btnSubmit" type="submit">S'inscrire</button></div>
								</div>
							</form>
						

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
						Si oui, veuillez vous <a>déconnecter</a> puis revenez ici <br> Si non retournew vers <a>la page de votre profil</a>. </p>
					</div>
				</div>		
			</div>
		<?php	
		}?>

	</div>	<!-- /container -->
	

<?php $content=ob_get_clean(); ?>
<?php require('template.php'); ?>