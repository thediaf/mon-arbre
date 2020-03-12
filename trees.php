<?php
   // if (session_id())
        session_start(); 
    $title='Inscription - Mon arbre' ?>

	<header id="heade"></header>

    <!-- container -->
    <div class="container tree">
        <ol class="breadcrumb">
            <li><a href="index.php">    Accueil</a></li>
            <li class="active">Profil</li>
        </ol>

        <header class="page-header">
            <h1 class="page-title">Mon arbre</h1>
        </header>
        <?php 
            require_once('model/FamilyManager.php');
            require_once('model/PersonManager.php');

            $personManager = new PersonManager();
            $familyManager = new FamilyManager();

            $family = $familyManager->getFamilyInfo($_SESSION['idUser']);
            $link = array(
                'self'      =>  'Moi-meme',
                'father'    =>  'Père',
                'mother'    =>  'Mère',
                'joint'     =>  'Conjoint(e)',
                'son'       =>  'Fils',
                'daughter'  =>  'Fille',
                'brother'   =>  'Frère'
            );
            if ($family){ 
                $txt = "<table class='table table-striped'><tr><th>Lien</th><th>Prénom</th>
                        <th>Nom</th><th>Date de naissance</th><th>Lieu de naissance</th>
                        <th>Description</th><th>Photo</th><th>Modifier</th><th>Supprimer</th></tr>";
                        $i = 0;
                foreach ($family As $member => $val){
                    $person = $personManager->getPers($family[$member]);
                    if ($member != 'id' AND $member != 'idUser' AND !is_int($member)){
                        if ($person){
                //  while () {
                            $id = $person['id'];
                            
                            $i++;
                            $txt .= "<tr>";
                            $txt .= "<td><a href='detail.php?id=$id'>" . $link[$member] ."</a></td>";
                            $txt .= "<td>".$person['firstName']."</td>";
                            $txt .= "<td>".$person['lastName']."</td>";
                            $txt .= "<td>".$person['birthDay']."</td>";
                            $txt .= "<td>".$person['birthLocality']."</td>";
                            $txt .= "<td>".$person['description']."</td>";
                            $txt .= "<td> <img src=".$person['photo']." width='70' height='70' class='img1 img  img-responsive'></td>";
                            $txt .= "<td><a href='update.php?id=$id&amp;sv=tree'><span class=\"fa fa-edit\"></span></a></td>";
                            $txt .= "<td><a href='remove.php?id=$id&amp;sv=tree'><span class=\"fa fa-trash-o\"></span></a></td>";
                        }
                    }
                }
			echo $txt."</table>";?>
            <button class="btn btn-success btnSearch" href="#infos" data-toggle="modal"><span class="fa fa-plus"></span> Ajouter une personne</button>
                    
        <?php   } 
        else{ ?>
            <div>
                <p>Pour la création de votre arbre veuillez renseigner ces 3 blocs qui contiendront respectivement
                    les informations de votre père, mère et de vous meme </p>
            </div>

            <div class="block">

                <div class="row">
                    <div class="col-md-offset-1 col-md-4 col-xs-5 corps">
                        <div class="initiale"><a href="#infos" id="father" data-toggle="modal"><span class="fa fa-plus"></span></a></div>
                        
                    </div>

                    <div class="col-md-4 col-xs-5 corps">
                        <div class="initiale"><a href="#infos" id="mother" data-toggle="modal"><span class="fa fa-plus"></span></a></div>
                    </div>
                </div>

                <div class="row col-md-offset-0">
                    <div class="trait"></div>
                </div>    

                <div class="row col-md-offset-2 col-xs-offset-2">
                    <div class=" corps">
                        <div class="initiale"><a href="#infos" id="self" data-toggle="modal"><span class="fa fa-plus"></span></a></div>
                    </div>
                </div>

            </div>        
        <?php } ?>
        <div class="modal fade" data-backdrop="false" id="infos">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" type="button" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Ajout d'une personne à mon arbre</h4>    
                    </div>
                    <div class="modal-body">
                        <form method="post" action="controller/frontend.php?action=newPerson" enctype="multipart/form-data">
                            <div class="top-margin">
                                <select name="sex" class="form-control">
                                    <option>Qui est-ce</option>
                                    <option value="self">Moi meme</option>
                                    <option value="father">Mon père</option>
                                    <option value="mother">Ma mère</option>
                                    <option value="joint">Conjoint(e)</option>
                                    <option value="son">Mon fils</option>
                                    <option value="daughter">Ma fille</option>
                                    <option value="brother">Mon frère</option>
                                    <option value="sister">Ma soeur</option>
                                    <option value="grandfather">Mon grand-père</option>
                                    <option value="grandmother">Ma grand-mère</option>
                                </select>
                            </div>
                            <div class="top-margin">
                                <div id="profile-container">
                                    <img src="../assets/images/photo.png" alt="Photo de profil" align="center" id="profileImage">
                                </div>
                                <input type="file" id="imageUpload" name="profile_photo" placeholder="Photo" capture>
                            </div>
                            
                            <div class="top-margin">
                                <input type="text" id="inputP" placeholder="Prenom" name="firstName" class="form-control">
                                <input type="text" id="inputP" placeholder="Nom" name="lastName" class="form-control">
                            </div>

                            <div class="top-margin">
                                
                                <input type="date" id="inputP" placeholder="Date de naissance" name="birthDay" class="form-control">
                                <!--input type="text" placeholder="Date de naissance" name="birthDay" class="form-control"-->
                                <input type="text" id="inputP" placeholder="Lieu de naissance" name="birthLocality" class="form-control">
                            </div>
                            
                            <div class="top-margin">
                                    <!--input type="text" id="inputP" placeholder="Qui est-ce" name="sex" class="form-control"-->
                                
                                <input type="text" id="inputP" placeholder="Déscription" name="description" class="form-control">
                            </div><hr>

                            <div class="top-margin">
                                <button class="btn btnSubmit" name="tst" value="djhdj" type="submit"><span class="fa fa-plus-circle"></span> Ajouter</button>
                            </div>
                        </form> 
                    </div>	<!-- /modal-body -->
                </div>	<!-- /modal-content -->
            </div>	<!-- /modal-dialog -->
        </div>	<!-- /modal -->
    </div>	<!-- /container -->


	

<?php $content=ob_get_clean(); ?>
<?php require('template.php'); ?>

