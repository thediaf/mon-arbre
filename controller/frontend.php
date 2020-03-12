<?php
    session_start();
?>
<?php
  
    require_once('../model/UserManager.php');
    require_once('../model/PersonManager.php');
    require_once('../model/FamilyManager.php');
    require_once('../model/PictManager.php');
    
    
    if ($_GET['action'] == 'new')
    {
      $userManager = new UserManager();
      if ($_POST['passWord'] == $_POST['pwd']){
        $userManager->addUser($_POST['firstName'], $_POST['lastName'], $_POST['login'], $_POST['passWord']);
        $req = $userManager->getUser($_POST['login'], $_POST['passWord']);
        $data = $req->fetch();   
        $_SESSION['idUser'] = $data['id'];
        header("Location:../test.php");	
          
      }
      else
        header("Location: ../signup.php?msg=Mot de passe de confirmation incorrect !");
    }
    elseif ($_GET['action'] == 'connect')
    {
      $userManager = new UserManager();

      if(isset($_POST["login"])){
        $login = $_POST["login"];
        $pwd = $_POST["passWord"];
          
        $req = $userManager->getUser($login, $pwd);

        if ($data = $req->fetch()) {
          $_SESSION['login'] = $login;
          $_SESSION['pwd'] = $pwd;
          $_SESSION['idUser'] = $data['id'];
          header("Location:../test.php");	
          
        }
        else
          header("Location:../signin.php?msg=Login ou mot de passe incorrect !");
      }
    }
    elseif ($_GET['action'] == 'newPerson')
    {
      $personManager = new PersonManager();
      $familyManager = new FamilyManager();

      $filename = $_FILES['profile_photo']['name'];
      $filetmpname = $_FILES['profile_photo']['tmp_name'];
      $folder = '../assets/images/';
      $filename = ($filename) ? $filename : 'photo.png';
      $filename = $folder.$filename;
      move_uploaded_file($filetmpname, $filename);
      
      $personManager->addPerson($_POST['firstName'], $_POST['lastName'], $_POST['birthDay'], $_POST['birthLocality'], $_POST['sex'], $_POST['description'], $filename);
      $person = $personManager->getPerson($_POST['firstName'], $_POST['lastName'], $_POST['birthDay']);
      $family = $familyManager->getFamily($_SESSION['idUser']);
      
      if ($fam = $family->fetch())
      {
        $result = $familyManager->addPerson($_SESSION['idUser'], $_POST['sex'], $person['id']);
        header("Location:../trees.php");
      } else {
        $familyManager->addFamily($_SESSION['idUser'], $_POST['sex'], $person['id']);
          header("Location:../trees.php");
      }
      
    }
    elseif ($_GET['action'] == 'newPict')
    {
      $pictManager = new PictManager();

      $filename = $_FILES['profile_photo']['name'];
      $filetmpname = $_FILES['profile_photo']['tmp_name'];
      $folder = '../assets/images/';
      $filename = ($filename) ? $filename : 'photo.png';
//      echo '<br><br><br><br><br>$filename<br> <br><br><br><br>';
      $filename = $folder.$filename;
      move_uploaded_file($filetmpname, $filename);
      
      $pictManager->addPict($_SESSION['idUser'], $filename);
      $_SESSION['verif'] = 1;
     // echo $filename;
     header("Location:../picts.php");
    }
    elseif ($_GET['action'] == 'search')
    {
      $personManager = new PersonManager();
      $req = $personManager->getPersons($_POST['search']);

      header("Location:../search.php?msg=res");
    }
   