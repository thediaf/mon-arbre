<?php
    session_start();     
?>
<?php $title='Mon album - Mon arbre' ?>

	<header id="heade"></header>

    <!-- container -->
    <div class="container tree">
        <ol class="breadcrumb">
            <li><a href="index.php">    Accueil</a></li>
            <li class="active">Admin</li>
        </ol>

        <header class="page-header">
            <h1 class="page-title">Bienvenue dans la page d'administration</h1>
        </header>

        <?php
            require_once('model/FamilyManager.php');
            require_once('model/PersonManager.php');
            require_once('model/UserManager.php');

            $personManager = new PersonManager();
            $familyManager = new FamilyManager();
            $userManager = new UserManager();

            $numberOfFamilies = $familyManager->getNbrFamilies();
            $numberOfUsers = $userManager->getNbrUsers();
            $numberOfPersons = $personManager->getNbrPersons();

        ?>

        <div>
            <h4 class="text-muted">Ce site contient <?= $numberOfUsers ?> comptes d'utilisateurs, <?= $numberOfFamilies ?> arbres et 
                <?= $numberOfPersons ?> personnes <br> <br> </h4>
        </div>
        
        <section class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <ul class="nav nav-pills">
            <li><a href="#persons" data-toggle="tab">Les personnes</a></li>
            <li class="active"><a href="#users" data-toggle="tab">Les utilisateurs</a></li>
          </ul>
        <div class="tab-content">
            <div class="tab-pane fade" id="persons">
        <?php
            $persons = $personManager->getPersons();
            $families = $familyManager->getFamilies();

            
            if ($person = $persons->fetch()){ 
                echo "<h3 class=\"text-center\">Liste des personnes et leurs differentes informations</h3><br>";        
                $txt = "<table class='table table-striped'><tr><th>N</th><th>Prénom</th>
                        <th>Nom</th><th>Date de naissance</th><th>Lieu de naissance</th>
                        <th>Description</th><th>Photo</th><th>Modifier</th><th>Supprimer</th></tr>";
                        $i = 0;
                do
                {
                    $id = $person['id'];
                    
                    $i++;
                    $txt .= "<tr>";
                    $txt .= "<td><a href='details.php?id=$id'>" . $i ."</a></td>";
                    $txt .= "<td>".$person['firstName']."</td>";
                    $txt .= "<td>".$person['lastName']."</td>";
                    $txt .= "<td>".$person['birthDay']."</td>";
                    $txt .= "<td>".$person['birthLocality']."</td>";
                    $txt .= "<td>".$person['description']."</td>";
                    $txt .= "<td> <img src=".$person['photo']." width='70' height='70' class='img1 img  img-responsive'></td>";
                    $txt .= "<td><a href='update.php?id=$id&amp;sv=admin'><span class=\"fa fa-edit\"></span></a></td>";
                    $txt .= "<td><a href='remove.php?id=$id&amp;sv=admin'><span class=\"fa fa-trash-o\"></span></a></td>";
                }while ($person = $persons->fetch());
                    
                
                echo $txt."</table>";
            }
        ?>
        </div>
        <div class="tab-pane fade active in" id="users">
         <?php
            $users = $userManager->getUsers();
            
            
            if ($user = $users->fetch()){ 
                echo "<h3 class=\"text-center\">Liste des utilisateurs et leurs differentes informations</h3><br>";        
                $txt = "<table class='table table-striped'><tr><th>N</th><th>Prénom</th>
                        <th>Nom</th><th>Login</th><th>Admin</th><th>Modifier</th><th>Supprimer</th></tr>";
                        $i = 0;
                do
                {
                    $id = $user['id'];
                    
                    $i++;
                    $txt .= "<tr>";
                    $txt .= "<td><a href='details.php?id=$id'>" . $i ."</a></td>";
                    $txt .= "<td>".$user['firstName']."</td>";
                    $txt .= "<td>".$user['lastName']."</td>";
                    $txt .= "<td>".$user['login']."</td>";
                    $txt .= "<td>".$user['admin']."</td>";
                    $txt .= "<td><a href='updateUser.php?id=$id&amp;sv=admin'><span class=\"fa fa-edit\"></span></a></td>";
                    $txt .= "<td><a href='removeUser.php?id=$id&amp;sv=admin'><span class=\"fa fa-trash-o\"></span></a></td>";
                }while ($user = $users->fetch());
                    
                
                echo $txt."</table>";
                echo '<a href="signup.php" class="btn btn-info" role="button">
                        <span class="fa fa-plus"></span> Ajouter un utilisateur</a>';
            }
          ?>
        </div>
        </div>
        </div>
        </section>

    </div>	<!-- /container -->

<?php $content=ob_get_clean(); ?>
<?php require('template.php'); ?>
