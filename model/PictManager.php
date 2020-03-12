<?php

    require_once('Manager.php');
    class PictManager extends Manager
    {
        public function getPicts($idUser)
        {
            $db = $this->dbConnect();
            $req = $db->query("SELECT * FROM picts WHERE idUser = $idUser;");

            return $req;
        }

        public function addPict($idUser, $image)
        {
            $db = $this->dbConnect();
            $req = $db->prepare("INSERT INTO picts(idUser,image) VALUES(?, ?)"); 
            $req->execute(array($idUser, $image));
              

            
        }

        
    }