<?php

    require_once('Manager.php');
    
    class FamilyManager extends Manager
    {
        public function getFamily($idUser)
        {
            $db = $this->dbConnect();
            $req = $db->query("SELECT * FROM family WHERE idUser= '$idUser';");

            return $req;
        }

        public function getFamilyInfo($idPerson)
        {
            $db = $this->dbConnect();
            $req = $db->query("SELECT * FROM family WHERE idUser='$idPerson' OR self='$idPerson' ;");
            $data = $req->fetch();

            return $data;
        }

        public function getFamilies()
        {
            $db = $this->dbConnect();
            $req = $db->query("SELECT * FROM family;");
            //$data = $req->fetch();

            return $req;
        }

        public function getTree($idUser)
        {
            $db = $this->dbConnect();
            $req = $db->query("SELECT * FROM family WHERE idUser='$idUser' 
                                AND self is not null 
                                AND father is not null
                                AND mother is not null;");

            return $req;
        }

        public function addFamily($idUser, $person, $idPerson)
        {
            $db = $this->dbConnect();
            
            switch ($person) {
                case 'self':
                    $req = $db->prepare("INSERT INTO family(idUser, self) VALUES(:idUser, :idPerson)");
                    break;
                case 'father':
                    $req = $db->prepare("INSERT INTO family(idUser, father) VALUES(:idUser, :idPerson)");
                    break;
                case 'mother':
                    $req = $db->prepare("INSERT INTO family(idUser, mother) VALUES(:idUser, :idPerson)");
                    break;
                default:
                    # code...
                    break;
            }
            $req->execute(array(
                'idUser' => $idUser,
                'idPerson' => $idPerson
            ));
            
           //   $req->debugDumpParams();
            }

        public function addPerson($idUser, $person, $idPerson)
        {
            $db = $this->dbConnect();
            
            switch ($person) {
                case 'self':
                    $req = $db->prepare('UPDATE family SET self = :idPerson WHERE idUser = :idUser');
                    break;
                case 'father':
                    $req = $db->prepare('UPDATE family SET father = :idPerson WHERE idUser = :idUser');
                    break;
                case 'mother':
                    $req = $db->prepare('UPDATE family SET mother = :idPerson WHERE idUser = :idUser');
                    break;
                case 'joint':
                    $req = $db->prepare('UPDATE family SET joint = :idPerson WHERE idUser = :idUser');
                    break; 
                case 'son':
                    $req = $db->prepare('UPDATE family SET son = :idPerson WHERE idUser = :idUser');
                    break;
                case 'daughter':
                    $req = $db->prepare('UPDATE family SET daughter = :idPerson WHERE idUser = :idUser');
                    break;
                case 'brother':
                    $req = $db->prepare('UPDATE family SET brother = :idPerson WHERE idUser = :idUser');
                    break;
                case 'sister':
                    $req = $db->prepare('UPDATE family SET sister = :idPerson WHERE idUser = :idUser');
                    break;
                case 'grandfather':
                    $req = $db->prepare('UPDATE family SET grandfather = :idPerson WHERE idUser = :idUser');
                    break;
                case 'grandmother':
                    $req = $db->prepare('UPDATE family SET grandmother = :idPerson WHERE idUser = :idUser');
                    break;   
                default:
                    # code...
                    break;
            }
            
            
            $result = $req->execute(array(
                'idPerson' => $idPerson,
                'idUser' => $idUser
                ));

            return $result;
        }

        public function getNbrFamilies()
        {
            $db = $this->dbConnect();
            $req = $db->query("SELECT COUNT(*) AS nbr FROM family;");
            $data = $req->fetch();
            $nb = $data['nbr'];
            
            return $nb;
        }
    }