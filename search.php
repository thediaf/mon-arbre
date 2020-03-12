<?php $title='Chercher une personne - Mon arbre' ?>

	<header id="heade"></header>
    
    <div class="container tree">
        <ol class="breadcrumb">
            <li><a href="index.php">    Accueil</a></li>
            <li class="active">Recherche</li>
        </ol>         
        <header class="page-header">
            <h1 class="page-title">Recherche</h1>
        </header>

        <div class="row">
        <div class="col-md-6 col-sm-6">                      
        <form method="POST" action=""> 
            <div class="inputSearch">
                <input type="text" placeholder="Tapez le nom de la personne que vous chercher..." name="search" class="form-control">
                <button class="btn btn-default btnSearch" type="submit"><span class="fa fa-search"></span> Chercher</button> 
            </div>
        </form>
        </div>
        </div>
        <hr>

        <?php

        
        if (isset($_POST['search'])){
            require_once('model/PersonManager.php');
            $personManager = new PersonManager();
            $req = $personManager->searchPerson($_POST['search']);

            $txt = "<table class='table table-striped'><tr><th>N</th><th>Prénoms</th><th>Nom</th><th>Description</th></tr>";
            
            $i = 0;
            while($data = $req->fetch()){
                $i++;
                $id = $data['id'];
                $txt .= "<tr>";
                $txt .= "<td><a href='details.php?id=$id'>$i</a></td>";
                $txt .= "<td>".$data['firstName']."</td>";
                $txt .= "<td>".$data['lastName']."</td>";
                $txt .= "<td>".$data['description']."</td>";
            
            }
            echo $txt."</table>";
        }
        ?>
    </div>

<?php $content=ob_get_clean(); ?>
<?php require('template.php'); ?>
