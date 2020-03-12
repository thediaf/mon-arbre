<?php
    require_once('model/PersonManager.php');

    $personManager = new PersonManager();

    if (isset($_GET['id'])){
        $personManager->removePerson($_GET['id']);
        if ($_GET['sv'] == 'tree')
            header("Location: trees.php");
        else
            header("Location: admin.php");

    }

    
