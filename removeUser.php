<?php
    require_once('model/UserManager.php');

    $userManager = new UserManager();

    if (isset($_GET['id'])){
        $userManager->removeUser($_GET['id']);
        header("Location: admin.php");

    }

    
